<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    protected $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }
    public function index()
    {

        $leads = $this->lead->orderBy('created_at', 'desc')->paginate(10);

        //Pegando a contagem de leads por status
        $leadsCount = $this->lead
            ->selectRaw('COUNT(CASE WHEN status = "pending" THEN 1 END) as leads_pending')
            ->selectRaw('COUNT(CASE WHEN status = "failed" THEN 1 END) as leads_failed')
            ->selectRaw('COUNT(CASE WHEN status = "success" THEN 1 END) as leads_success')
            ->first();

        return view('dashboard.index', [
            'leads' => $leads,
            'leadsCount' => $leadsCount
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'user_id' => 'required'
            ]);

            if ($validated->fails()) {
                return response()->json(['errors' => $validated->errors()], 422);
            }

            $lead = $this->lead->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => 'pending',
                'last_contact' => null,
                'message' => is_null($request->message) ? "Sem mensagem" : $request->message
            ]);

            return response()->json([$lead]);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['errors' => "Não foi possível registrar o lead."], 422);
        }
    }

    public function update(Request $request, $leadId)
    {
        try {
            //Poderíamos tratar todos os erros com classes Request específicas para cada function

            $validated = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'user_id' => 'required',
                'status' => 'required',
            ]);

            if ($validated->fails()) {
                return response()->json(['errors' => $validated->errors()], 422);
            }

            //Buscar pelo lead;
            $lead = $this->lead->findOrFail($leadId);

            //Verificar se lead existe;
            if (!$lead) {
                return response()->json(['errors' => "Não foi possível localizar o lead."], 404);
            }

            $lead->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
                'message' => $request->message
            ]);
            return response()->json([$lead]);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['errors' => "Não foi possível atualizar o lead."], 422);
        }
    }

    public function destroy($leadId)
    {
        try {

            $this->lead->destroy($leadId);


            return response()->json([true]);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['errors' => "Não foi possível deletar o lead."], 422);
        }
    }
}

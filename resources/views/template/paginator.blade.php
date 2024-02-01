<ul class="pagination justify-content-center">
    @if ($paginator->onFirstPage())
        <li class="paginate_button page-item previous disabled" aria-disabled="true">
            <a style="color:#000; " class="page-link">&laquo; Anterior</a>
        </li>
    @else
        <li class="paginate_button page-item previous">
            <a style="color:#000; " class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Anterior</a>
        </li>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="paginate_button page-item disabled" aria-disabled="true">
                <a style="color:#000; " class="page-link">{{ $element }}</a>
            </li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="paginate_button page-item active">
                        <a style="color:#000; background-color: #ffc107; border-color: #ffc107;" class="page-link">{{ $page }}</a>
                        <!-- Adiciona a cor de aviso ao link da página ativa -->
                    </li>
                @else
                    <li class="paginate_button page-item">
                        <a style="color:#000; " class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li class="paginate_button page-item next">
            <a style="color:#000; " class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Próxima &raquo;</a>
        </li>
    @else
        <li class="paginate_button page-item next disabled" aria-disabled="true">
            <a style="color:#000; " class="page-link">Próxima &raquo;</a>
        </li>
    @endif
</ul>

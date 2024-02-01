        //Registrar novo lead via API:

        $('#add-lead').click(function() {
            let form = $('#form-add-lead').serializeArray();
            $.ajax({
                url: '/api/lead/store',
                method: 'POST',
                data: form,
                success: function(response) {
                    console.log(response);
                    showAlert('Lead registrado com sucesso!', 'success');
                    setInterval(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(error) {
                    showAlert('Não foi possível registrar o lead', 'error');
                    console.error('Não foi possível registrar o lead:', error.responseJSON);

                }
            });
        });

        //Editar Lead Via API:
        $('.edit-lead').click(function() {
            let leadId = $(this).val();
            let form = $(`#form-edit-lead-${leadId}`).serializeArray();

            $.ajax({
                url: `/api/lead/update/${leadId}`,
                method: 'PUT',
                data: form,
                success: function(response) {
                    console.log(response);
                    showAlert('Lead atualizado com sucesso!', 'success');
                    setInterval(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(error) {
                    showAlert('Não foi possível atualizar o lead', 'error');
                    console.error('Não foi possível atualizar o lead:', error.responseJSON);

                }
            });
        });

        //Deletar Lead Via API:

        $('.delete-lead').click(function() {
            let leadId = $(this).val();

            $.ajax({
                url: `/api/lead/delete/${leadId}`,
                method: 'DELETE',
                success: function(response) {
                    console.log(response);

                    alert("Lead deletado com sucesso!");
                    location.reload();
                },
                error: function(error) {
                    showAlert('Não foi possível atualizar o lead', 'error');
                    console.error('Não foi possível atualizar o lead:', error.responseJSON);

                }
            });
        });

        function showAlert(message, type, alertUpdate = false) {
            let alertClass = 'alert-info'
            if (type === 'success') {
                alertClass = 'alert-success'
            } else if (type === 'error') {
                alertClass = 'alert-danger';
            }
            let alertHtml = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">';
            alertHtml += message;

            if (alertUpdate == '#alerts-update') {
                $('#alerts-update').html(alertHtml)
            }

            if (alertUpdate == false) {
                $('#alerts').html(alertHtml);
            }
        }

import Swal from 'sweetalert2';

window.confirmDelete = function(button) {
    const form = button.closest('form');
    const url = form.action;
    const token = form.querySelector('input[name="_token"]').value;
    const method = form.querySelector('input[name="_method"]').value;

    Swal.fire({
        title: 'Ви впевнені?',
        text: "Ви не зможете відновити цей об'єкт!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Так, видалити!',
        cancelButtonText: 'Скасувати'
    }).then((result) => {
        if (result.isConfirmed) {
            // Якщо підтверджено, відправляємо Ajax запит
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    _method: method,
                    _token: token
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire(
                            'Видалено!',
                            data.message,
                            'success'
                        ).then(() => {
                            // Перезавантажити сторінку або видалити елемент з DOM
                            location.reload();
                        });
                    } else {
                        throw new Error(data.message || 'Error occurred');
                    }
                })
                .catch(error => {
                    Swal.fire(
                        'Помилка!',
                        error.message,
                        'error'
                    );
                });
        }
    });
}

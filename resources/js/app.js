import './bootstrap';
import '../css/app.css';

import Swal from 'sweetalert2';

window.deleteConfirm = function(postId)
{
    Swal.fire({
        icon: 'Uyarı',
        text: 'Silmek istediğinizden emin misiniz?',
        showCancelButton: true,
        confirmButtonText: 'Sil',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(postId).submit();
        }
    });
}

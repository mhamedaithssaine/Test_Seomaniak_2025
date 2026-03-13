/**
 * Delete confirmation with SweetAlert2 for .btn-delete forms
 */
function initDeleteConfirm() {
    document.querySelectorAll('.btn-delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const form = this.closest('form');
            if (typeof Swal === 'undefined') {
                if (confirm('Supprimer ce contact ?')) form.submit();
                return;
            }
            Swal.fire({
                title: 'Supprimer ce contact ?',
                text: 'Cette action est irréversible.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler',
            }).then(function (result) {
                if (result.isConfirmed) form.submit();
            });
        });
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initDeleteConfirm);
} else {
    initDeleteConfirm();
}

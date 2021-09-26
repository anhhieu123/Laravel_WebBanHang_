function onDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        $.ajax({
                type: 'GET',
                url: urlRequest,
                seccess: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                    }
                },
                error: function() {

                }
            })
            // if (result.isConfirmed) {
            //     Swal.fire(
            //         'Deleted!',
            //         'Your file has been deleted.',
            //         'success'
            //     )
            // }
    })
}
$(function() {
    $(document).on('click', '.action_delete', onDelete);

});
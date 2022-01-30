$('.deleteModal').on('click',  () => {
    // Get real delete button
    const deleteButton = $('.deleteReal')[0];

    // Open modal and click hidden delete button on confirm
    $('#confirmDeleteModal').modal({
        backdrop: 'static',
        keyboard: true
    }).on('click', '#delete', () => deleteButton.click());
});
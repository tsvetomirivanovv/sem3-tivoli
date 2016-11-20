$(document).on('click', '.reject_button', function () {
    accountId = $(this).attr('id');
});

$(document).on('click', '#rejectUserModal', function () {
    $.ajax('core/functions/profile/reject-user.php', {
        type: 'POST',
        dataType: 'json',
        data: {
            account_id: accountId
        }
    })
    .done(function (response) {
        if (response.success) {
            var row = approveTable.row($('tr').filter("[id=" + accountId + "]"));
            row.remove().draw(false);
            updateUserCount();
            $.growl.notice({title: "Success", message: response.message});

        } else {
            $.growl.error({title: "Error", message: response.message});
        }
    })
});

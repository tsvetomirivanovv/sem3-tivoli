$.ajax({
    type: "POST",
    url: 'core/functions/profile/approve-accounts.php',
    dataType: "json",
})
.done(function (response) {
    if (response.success) {
        var approve_accounts = '';
        response.accounts.forEach(function (accountData) {
            approve_accounts += '<tr id="' + accountData['user_id'] + '">' +
                '   <th>' +
                '       <div>' +
                '           <span>' +
                '               <a href="profile-page.php?username=' + accountData['username'] + '">' +
                '                   <img class="avatarSize" src="' + accountData['profile_picture'] + '">' +
                '               </a>' +
                '           </span>' +
                '       </div>' +
                '   </th>' +
                '   <td> ' + accountData['first_name'] + ' ' + accountData['last_name'] + '</td>' +
                '   <td>' + accountData['email'] + '</td>' +
                '   <td><span><a class="cvLink" href="' + accountData['cv'] + '" target="_blank">CV</a></span>' +
                '       <div class="updateButtonPos"><a class="approve_button" type="button" data-toggle="modal" data-target="#approveUserModal" id="' + accountData['user_id'] + '"><span class="glyphicon glyphicon-ok" style="margin-right: 15px;"></span></a>' +
                '       <div class="updateButtonPos"><a class="reject_button" type="button" data-toggle="modal" data-target="#rejectUserModal" id="' + accountData['user_id'] + '"><span class="glyphicon glyphicon-remove" style="margin-right: 15px;"></span></a>' +
                '   </td>' +
                '</tr>';
        });
        $("#tableBodyApprove").append(approve_accounts);

    } else {
        console.error('Accounts unsuccessfully fetched');
    }
    approveTable = $('#approveTable').DataTable();
});

$(document).on('click', '.approve_button', function () {
    storageAccountId = $(this).attr('id');
});

$(document).on('click', '#approveButton', function () {
    $.ajax('core/functions/profile/approve.php', {
        type: 'POST',
        dataType: 'json',
        data: {
            account_id: storageAccountId
        }
    })
        .done(function (response) {
            if (response.success) {
                var row = approveTable.row($('tr').filter("[id=" + storageAccountId + "]"));
                row.remove().draw(false);
                updateUserCount();
                $.growl.notice({title: "Success", message: response.message});
            } else {
                $.growl.error({title: "Error", message: response.message});
            }
        })
});

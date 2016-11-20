$.ajax({
    type: "POST",
    url: 'core/functions/users/view-all-accounts.php',
    dataType: "json",
})
.done(function (response) {
    if (response.success) {
        var accounts = '';
        var oddOrEven = 1;
        var oddOrEvenText = '';
        response.accounts.forEach(function (accountData) {
            if (oddOrEven % 2 == 1) {
                oddOrEvenText = 'odd';
            } else {
                oddOrEvenText = 'even';
            }
            accounts += '<tr role="row" class="' + oddOrEvenText + '">' +
                '   <th class="sorting_1">' +
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
                '   <td><span class="' + accountData['dotColor'] + '"><span class="' + accountData['dotClass'] + '"></span>' + accountData['isOnline'] + '</span>' +
                '       <a href="edit-profile.php?username=' + accountData['username'] + '"><span class="glyphicon glyphicon-edit updateButtonPos"></span></a>' +
                '   </td>' +
                '</tr>';
            oddOrEven++;
        });
        $("#tableBody").append(accounts);

    } else {
        console.error('Accounts unsuccessfully fetched');
    }
    $('#usersTable').DataTable();
});

$(document).ready(function () {
    $.ajax({
        url: 'ajax/getUserForBase.php',
        type: "POST",
        // cache: false,
        dataType: "json",
        // data: {msg : msg},
        success: function (response) {
            try {

                var table = $('<table>');
                var thead = $('<thead>');
                var tbody = $('<tbody>');


                var headerRow = $('<tr>');
                headerRow.append($('<th>').text('First name'));
                headerRow.append($('<th>').text('Last name'));
                thead.append(headerRow);


                for (var i = 0; i < response.length; i++) {
                    var user = response[i];
                    var row = $('<tr>');
                    row.append($('<td>').text(user.first_name));
                    row.append($('<td>').text(user.last_name));
                    row.append(
                        $('<td>').append(
                            $('<a>').attr('href', '').addClass('deleteEdit').addClass('fa fa-pencil').text('Edit'),
                            $('<a>').attr('href', '').addClass('deleteUser').attr('data-userid', user.id).addClass('fa fa-trash').text('Delete')
                        )
                    );
                    tbody.append(row);
                }


                $('.users table').remove();
                $('.users').append(table);
                table.append(thead);
                table.append(tbody);


                $('.column.column-7 .section_content').append($('.users'));


            } catch (error) {
                console.log(error);
            }
        }
    });
});

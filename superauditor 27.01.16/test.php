<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <br>
        <table id="maintable" width="50%" cellpadding="0" cellspacing="0" class="pdzn_tbl1" border="#729111 1px solid">
            <tr>
                <th align="center">Roll No</th>
                <th align="center">First Name</th>
                <th align="center">Last Name</th>
            </tr>
            <tr id="rows">
                   <td style="padding:5px;">
                        <input type="text" name="rollno<? $i ?>" />
                    </td>
                    <td style="padding:5px;">
                        <input type="text" name="firstname<? $i ?>" />
                    </td>
                    <td style="padding:5px;">
                        <input type="text" name="lastname<? $i ?>" />
                    </td>
            </tr>
        </table>
            <br><div id="add_new">ADD NEW
</div>

<script>
$("#add_new").click(function () { 

    $("#maintable").each(function () {
       
        var tds = '<tr>';
        jQuery.each($('tr:last td', this), function () {
            tds += '<td>' + $(this).html() + '</td>';
        });
        tds += '</tr>';
        if ($('tbody', this).length > 0) {
            $('tbody', this).append(tds);
        } else {
            $(this).append(tds);
        }
    });
});
</script>
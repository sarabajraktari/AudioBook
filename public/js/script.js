$(document).ready(function(){
    $(".add-row").click(function(){
        var chapter_name = $("#chapter_name[]").val();
        var reader = $("#reader[]").val();
        var time = $("#time[]").val();
        var audio = $("#audio[]").val();
        var markup = "<tr><td><input type='checkbox' name='record' style='margin-right:10px'>" + chapter_name + "</td><td>" + reader + "</td><td>" + time + "</td><td>" + audio + "</td></tr>";
        $("table tbody").append(markup);
    });

    // Find and remove selected table rows
    $(".delete-row").click(function(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
            }
        });
    });
});

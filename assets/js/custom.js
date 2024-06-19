$(document).ready(function() {
    $('.submit').click(function(event) {
        event.preventDefault();

        var name = $('.name').val();
        var email = $('.email').val();
        var password = $('.password').val();

        if (name === "" || email === "" || password === "") {
            $('.feedback').text('All fields are required.');
        } else {
            $.ajax({
                type: 'POST',
                url: ajaxUrl,
                data: {
                    name: name,
                    email: email,
                    password: password
                },
                success: function(data) {
                    var myvar="";
                    console.log("Response from server:", data);
                    // Optionally, handle the response data
                    var parsedData = JSON.parse(data);
                        myvar+='<tr>';
                            myvar+='<td>'+parsedData[0].stName+'</td>';
                            myvar+='<td>'+parsedData[0].stEmail+'</td>';
                            myvar+='<td>'+parsedData[0].stPassword+'</td>';
                        myvar+='</tr>';
                    $('.mytable').append(myvar);
                    // $('.mytable').prepend(myvar);
                    console.log(parsedData);
                    $('.feedback').text('User added successfully');
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred:', error);
                    $('.error-log').text('Error occurred: ' + error); // Display error in error-log div
                }
            });
        }
    });
});

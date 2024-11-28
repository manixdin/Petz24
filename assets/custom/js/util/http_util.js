const ERROR_STATUS = JSON.stringify({
    code : 500,
    msg: "Something went wrong!"
});

function GET({module}){
    return $.ajax({
        type: "GET",
        url: base_url + 'get' + module,
        dataType: "json",
        error: function (err) {
          console.log("Error :" + err);
        },
    });
}

function POST({module, fields, data}){
    
    if(fields){
        return $.ajax({
            type: "POST",
            url: base_url + 'getspecific' + module,
            data: fields,
            dataType: "json",
            success: function (response) {
                if(response){
                    return response
                }
                return ERROR_STATUS;
            },
            error: function (err) {
                console.log("Error :" + err);
            },
        });
    }

    return $.ajax({
        type: "POST",
        url: base_url + 'insert' + module,
        data: data,
        dataType: "json",
        cache : false,
        processData: false,
        contentType: false,
        success: function (response) {
            if(response){
                return response
            }
            return ERROR_STATUS;
        },
        error: function (err) {
        console.log("Error :" + err);
        },
    });

}

function PUT({module, data}){
    return $.ajax({
        type: "POST",
        url: base_url + 'update' + module,
        data: data,
        dataType: "json",
        cache : false,
        processData: false,
        contentType: false,
        success: function (response) {
            if(response){
                return response
            }
            return ERROR_STATUS;
        },
        error: function (err) {
            console.log("Error :" + err);
        },
    });
}

function DELETE({module, data}){
    return $.ajax({
        type: "POST",
        url: base_url + 'delete' + module,
        data: data,
        dataType: "json",
        success: function (response) {
            if(response){
                return response
            }
            return ERROR_STATUS;
        },
        error: function (err) {
            console.log("Error :" + err);
        },
    });
}
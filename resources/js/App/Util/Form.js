class Form {

    getAction(form){
        return $(form).attr('action');
    }

    getFormData(form){
        return $(form).serialize();
        /*let unindexedArray = $(form).serializeArray();
        let indexedArray = {};

        $.map(unindexedArray, function(n, i){
            indexedArray[n['name']] = n['value'];
        });

        return indexedArray;*/
    }
}

export { Form }

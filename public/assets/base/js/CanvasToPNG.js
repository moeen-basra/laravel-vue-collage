function CanvasToPNG(url) {

    this.url = url;

    this.savePNG = function (data, fileName) {
        if (!data || !url) return;
        fileName = fileName || 'picture';

        var dataInput = document.createElement("input");
        dataInput.setAttribute("name", fileName);
        dataInput.setAttribute("value", data);
        dataInput.setAttribute("type", "hidden");

        var myForm = document.createElement("form");
        myForm.method = 'post';
        myForm.action = url;
        myForm.appendChild(dataInput);

        document.body.appendChild(myForm);
        myForm.submit();
        document.body.removeChild(myForm);
    };
}
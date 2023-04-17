<form method="post" enctype="multipart/form-data">
    <input type="file" name="csvfile">
    <input type="submit" value="Convert to JSON">
</form>

<table>
    <tr>
        <th>Dimension</th>
        <th>Impression</th>
        <th>Click</th>
    </tr>
    <tr>
        <td id="dim1">320x480</td>
        <td><input id="imp1" placeholder="impression"></td>
        <td><input id="click1" placeholder="click"></td>
    </tr>
    <tr>
        <td id="dim2">300x250</td>
        <td><input id="imp2" placeholder="impression"></td>
        <td><input id="click2" placeholder="click"></td>
    </tr>
    <tr>
        <td id="dim3">300x600</td>
        <td><input id="imp3" placeholder="impression"></td>
        <td><input id="click3" placeholder="click"></td>
    </tr>
</table>


<script>function handleFormSubmit(event) {
    event.preventDefault();
    
    const fileInput = document.querySelector('input[type="file"]');
    const file = fileInput.files[0];
    const reader = new FileReader();
    
    reader.onload = function(event) {
        const csvData = event.target.result;
        const rows = csvData.split('\n');
        console.log(rows)
        var headers = rows.shift().split(',');
        headers = headers;
        console.log(headers);
        const data = [];
        
        for (const row of rows) {
            if (row.trim()) {
                const values = row.split(',');
                const rowData = {};
                for (let i = 0; i < headers.length; i++) {
                    rowData[headers[i]] = values[i];
                    
                }
                data.push(rowData);
            }
        }
        
        // Process JSON data
        processData(data);
    };
    
    reader.readAsText(file);
}

function processData(data) {
    console.log(data.length)
    for(var js=1;js<=data.length;js++){
        
        for (const row of data) {
        // Do something with each row of data
        
        if(document.getElementById("dim"+js).innerText==row['dimension']){
            
            document.getElementById("imp"+js).value=row['impressions']
            document.getElementById("click"+js).value=row['clicks\r']
        }
        
        
    }
    }
    
}

const form = document.querySelector('form');
form.addEventListener('submit', handleFormSubmit);
</script>
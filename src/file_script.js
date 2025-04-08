async function fetchData(link)
{
    const url = link;
    
    try
    {
        const response = await fetch(url);
        const data = await response.json();
        console.log(data);
        return data;
    }
    catch (error)
    {
        console.error(error.message);
    }
}

async function populateTable(link) 
{
    const data = await fetchData(link);
    data_table = document.getElementById("data_table");

    data.forEach(array => {
        const row = document.createElement("tr");
        const data1 = document.createElement("td");
        const data2 = document.createElement("td");
        const data3 = document.createElement("td");

        data1.textContent = array.nome;
        data2.textContent = array.cognome;
        data3.textContent = array.email;

        row.appendChild(data1);
        row.appendChild(data2);
        row.appendChild(data3);

        data_table.appendChild(row);
    });
}

document.getElementById("btn").addEventListener("click", function() {
    // Chiama la tua funzione
    populateTable("api/data.php");
  });

document.getElementById("btn1").addEventListener("click", function() {
    // Chiama la tua funzione
    populateTable("api/dataDB.php");
  });

async function insert()
{
    event.preventDefault();
    console.log("Porca troia");
    const formData = new FormData(document.getElementById("userForm"));
    const dataObj = {};

    formData.forEach((value, key) => {
        dataObj[key] = value;
    });

    const jsonData = JSON.stringify(dataObj);

    fetch("api/insert.php",
        {
            method: 'POST', 
            headers: {'Content-Type': 'application/json'}, 
            body: jsonData
        })
        .then(response => response.json())
        .then(result => {
            console.log('Risposta del server:', result); // Gestiamo la risposta dal server
        });
}

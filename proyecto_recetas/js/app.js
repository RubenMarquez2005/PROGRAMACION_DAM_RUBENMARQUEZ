document.querySelector("#btnGenerar").addEventListener("click", () => {
    let titulo = document.querySelector("#titulo").value;

    fetch("../api.php", {
        method: "POST",
        body: JSON.stringify({ titulo }),
        headers: { "Content-Type": "application/json" }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.mensaje);
        location.reload();
    });
});

function totalizaNota() {
    const table = document.getElementById("notas");
    const tbody = table.tBodies[0];
    const headerRow = table.tHead.rows[0];
    const lastRow = tbody.rows[tbody.rows.length - 1];
  
    const totalRow = document.createElement("tr");
    totalRow.innerHTML = "<td><b>Total</b></td>";
  
    for (let i = 1; i < lastRow.cells.length; i++) {
      let sum = 0;
      let count = 0;
  
      for (let row of tbody.rows) {
        const cell = row.cells[i];
        if (cell.textContent !== "") {
          sum += parseFloat(cell.textContent);
          count++;
        }
      }
  
      const average = sum / count;
      totalRow.innerHTML += `<td>${average.toFixed(2)}</td>`;
    }
  
    tbody.appendChild(totalRow);
  }
  
  function totalizaAluno() {
    const table = document.getElementById("notas");
    const tbody = table.tBodies[0];
    const headerRow = table.tHead.rows[0];
    const lastColumn = tbody.rows[tbody.rows.length - 1].cells[tbody.rows[0].cells.length - 1];

    const totalHeader = document.getElementById("titulo");
    const thColuna = document.createElement("th");
    thColuna.setAttribute("rowspan","2");
    thColuna.innerHTML = "<b>Total</b>";
    totalHeader.appendChild(thColuna);
  
    const totalColumn = document.createElement("td");
  
    for (let row of tbody.rows) {
      let sum = 0;
      let count = 0;
  
      for (let i = 1; i < row.cells.length; i++) {
        const cell = row.cells[i];
        if (cell.textContent !== "") {
          sum += parseFloat(cell.textContent);
          count++;
        }
      }
  
      const average = sum / count;
      row.appendChild(totalColumn.cloneNode(true));
      row.lastChild.textContent = average.toFixed(2);
    }

  }
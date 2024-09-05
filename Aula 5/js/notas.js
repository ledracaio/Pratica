function totalizaNota() {
  if (!notaDisabled) {
      notaDisabled = true;
      const table = document.getElementById("notas");
      const tbody = table.tBodies[0];
      const headerRow = table.tHead.rows[0];
      const lastRow = tbody.rows[tbody.rows.length - 1];

      const totalRow = document.createElement("tr");
      totalRow.style.backgroundColor = "silver";
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
}

function totalizaAluno() {
  if (!alunoDisabled) {
      alunoDisabled = true;
      const table = document.getElementById("notas");
      const tbody = table.tBodies[0];
      const headerRow = table.tHead.rows[0];
      const lastColumn = tbody.rows[tbody.rows.length - 1].cells[tbody.rows[0].cells.length - 1];

      const totalColumn = document.createElement("td");
      totalColumn.innerHTML = "<b>Total</b>";

      const headerColumn = document.createElement("th");
      headerColumn.setAttribute("rowspan", 2);
      headerColumn.innerHTML = "<b>Total</b>";

      headerRow.appendChild(headerColumn);

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
}

let alunoDisabled = false;
let notaDisabled = false;
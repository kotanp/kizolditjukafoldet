class Bejegyzes{
    constructor(szulo, adat) {
        this.szulo = szulo;
        szulo.append(
            `<table>
                <tr id="head">
                    <th>Osztály</th>
                    <th>Tevékenység</th>
                    <th>Pont</th>
                    <th>Státusz</th>
                </tr>
            </table>`
        );
        this.adat = adat;
        this.tabla = this.szulo.children("table");
        for (const index in adat) {
            this.tabla.append("<tr></tr>");
            this.tablaElem = this.tabla.children("tbody").children("tr:last");
            this.tablaElem.append(
              "<td>" + this.adat[index].osztaly[0].nev + "</td>"
            );
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg[0].tevekenyseg_nev + "</td>");
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg[0].pontszam + "</td>");
            this.tablaElem.append("<td>" + this.adat[index].allapot + "</td>");
          }
    }
}
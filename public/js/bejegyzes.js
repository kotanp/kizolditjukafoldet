class BejegyzesTablazat{
    constructor(szulo, adat) {
        this.szulo = szulo;
        this.tablazat(szulo);
        this.adat = adat;
        this.tabla = this.szulo.children("table:last");   
        this.tablazatEpites(adat,this.tabla);
        console.log(adat)
        
    }
    tablazat(szulo){
        szulo.append(
            `<table id="nagy">
                <tr id="head">
                    <th>Osztály</th>
                    <th>Tevékenység</th>
                    <th>Pont</th>
                    <th>Státusz</th>
                </tr>
            </table>`
        );
    }

    tablazatEpites(adat,tabla){
        for (const index in adat) {
            tabla.append("<tr></tr>");
            this.tablaElem = tabla.children("tbody").children("tr:last");
            this.tablaElem.append(
              "<td>" + this.adat[index].osztaly[0].nev + "</td>"
            );
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg[0].tevekenyseg_nev + "</td>");
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg[0].pontszam + "</td>");
            if(this.adat[index].allapot==="elfogadva"){
                this.tablaElem.append("<td class="+"allapot-kesz"+">" + this.adat[index].allapot + "</td>");
            }
            else{
                this.tablaElem.append("<td class="+"allapot-folyamatban"+">" + this.adat[index].allapot + "</td>");
            }
            
        }
        for (let index = 0; index < $(".allapot-elem").length; index++) {
            console.log($(".allapot-elem").eq(index));
            
        }
    }
}

class BejegyzesKisTablazat extends BejegyzesTablazat{
    constructor(szulo, adat){
        super(szulo, adat);
    }

    tablazat(szulo){
        szulo.append(
            `<table id="kicsi">
                <tbody>
                </tbody>
            </table>`
        );
    }
    tablazatEpites(adat, tabla){
        for (const index in adat) {
            tabla.append("<tr></tr>");
            this.tablaElem = tabla.children("tbody").children("tr:last");
            this.tablaElem.append(
              "<td>" + this.adat[index].osztaly[0].nev + "\nPontérték: " + this.adat[index].tevekenyseg[0].pontszam + "</td>"
            );
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg[0].tevekenyseg_nev + "\nStátusz: " + this.adat[index].allapot + "</td>");
        }
    }
}

class BejegyzesAdminTablazat extends BejegyzesTablazat{
    constructor(szulo, adatok){
        super(szulo, adatok);
    }

    tablazat(szulo){
        szulo.append(
            `<table>
                <tr>
                    <th>Osztály</th>
                    <th>Tevékenység</th>
                    <th>Pont</th>
                    <th>Státusz</th>
                    <th>Módosítás</th>
                </tr>
            </table>`
        );
    }

    tablazatEpites(adat,tabla){
        for (const index in adat) {
            tabla.append("<tr></tr>");
            this.tablaElem = tabla.children("tbody").children("tr:last");
            this.tablaElem.append(
              "<td class="+"osztaly"+">" + this.adat[index].osztaly[0].nev + "</td>"
            );
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg[0].tevekenyseg_nev + "</td>");
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg[0].pontszam + "</td>");
            this.tablaElem.append("<td>" + this.adat[index].allapot + "</td>");
            this.tablaElem.append("<td class="+"buttons"+">" + "<button>Elfogadás</button>" + "</td>");
            this.Modosit = this.tablaElem.children("td:last").children("button");
            this.Modosit.on("click",()=>{this.kattintasTrigger("elfogadas",adat[index]);});
        }
    }

    kattintasTrigger(gomb, adat){
        let esemeny = new CustomEvent(gomb, {detail:adat});
        window.dispatchEvent(esemeny);
    }
}
const express = require('express');
const app = express();
const port = 3000;

const bodyParser = require('body-parser');
app.use(bodyParser.json());

const mysql = require("mysql2");
  
const connection = mysql.createConnection({
  host: "localhost",
  user: "alesha",
  database: "best",
  password: "C5bf39d962406d1cefc15fafc8c6e533%"
});

class BuisnessLogic {
    constructor(averagePrice, Kazs, Ktank, TbuildPlace, Tdelivery, CcostTank, Cdirect, Cchecker, Csecurity, Cfuiller, Cazs, Cplace, NfuelPerClient, NfuelPerPlace, deltaVstorage, startVstorage, startVlocalstorage) {
        let maxRazn = -1 / 0;
        let localmax = 0;
        let Kmest;
        let incomesKmest = {}
        for (Kmest = 1; localmax >= maxRazn; Kmest++) {
            localmax = -((Kazs - Ktank) * CcostTank);
            console.log(localmax);
            let Vstorage = 0;
            let VstorageWithTimeDelivery = {};
            let Vlocalstorage = 0;
            for (let i = 0; i < TbuildPlace; i++) {
                localmax += 0 - Kazs * (Cdirect + Cchecker + Csecurity + Cazs);
                VstorageWithTimeDelivery[i + Tdelivery] = deltaVstorage[i];
                if (VstorageWithTimeDelivery[i] != undefined) {
                    Vlocalstorage += VstorageWithTimeDelivery[i];
                }
                console.log({localmax: localmax, Vlocalstorage: Vlocalstorage});
            }
            let incomes = {}
            for (let i = TbuildPlace; i < 12; i++) {
                VstorageWithTimeDelivery[i + Tdelivery] = deltaVstorage[i];
                if (VstorageWithTimeDelivery[i] != undefined) {
                    Vlocalstorage += VstorageWithTimeDelivery[i];
                }
                localmax += Math.min(Vlocalstorage / (Kmest * Kazs) / NfuelPerClient, Kmest * NfuelPerPlace) * averagePrice - Kazs * (Cdirect + Cchecker + Csecurity + Cfuiller*Kmest + Cplace * Kmest + Cazs);
                incomes[i] = Math.min(Vlocalstorage / (Kmest * Kazs) / NfuelPerClient, Kmest * NfuelPerPlace) * averagePrice;
                Vlocalstorage = 0;
                console.log({localmax: localmax, Vlocalstorage: Vlocalstorage});
            }
            console.log({Kmest: Kmest, localmax: localmax});
            maxRazn = Math.max(maxRazn, localmax);
            incomesKmest[Kmest] = incomes;
        }
        this.Kmest = Kmest-2;
        let incomes = incomesKmest[this.Kmest];
        
        let imonth = 0;
        let Vstorage = 0;
        let VstorageWithTimeDelivery = {};
        let Vlocalstorage = 0;
        
        function step() {
            console.log(VstorageWithTimeDelivery, deltaVstorage, Tdelivery, Vlocalstorage);
            switch (true) {
                case (imonth == 0):
                    imonth++;
                    return getStartMonth();
                case (imonth <= TbuildPlace):
                    VstorageWithTimeDelivery[imonth + Tdelivery] = deltaVstorage[imonth];
                    if (VstorageWithTimeDelivery[imonth] != undefined) {
                        Vlocalstorage += VstorageWithTimeDelivery[imonth];
                    }
                    imonth++;
                    return getBeforeN();
                case (imonth <= 12):
                    VstorageWithTimeDelivery[imonth + Tdelivery] = deltaVstorage[imonth];
                    if (VstorageWithTimeDelivery[imonth] != undefined) {
                        Vlocalstorage += VstorageWithTimeDelivery[imonth];
                    }
                    imonth++;
                    return {
                        income: Math.min(Vlocalstorage / (Kmest * Kazs) / NfuelPerClient, Kmest * NfuelPerPlace) * averagePrice,
                        costs: {
                            salary: Kazs * (Cdirect + Cchecker + Csecurity + Cfuiller*Kmest),
                            service: Kazs * (Cplace * Kmest + Cazs),
                            total: Kazs * (Cdirect + Cchecker + Csecurity + Cfuiller*Kmest + Cplace * Kmest + Cazs)
                        },
                        total: Math.min(Vlocalstorage / (Kmest * Kazs) / NfuelPerClient, Kmest * NfuelPerPlace) * averagePrice - Kazs * (Cdirect + Cchecker + Csecurity + Cfuiller*Kmest + Cplace * Kmest + Cazs)
                    }
            }
        }
    
        function getStartMonth() {
            return {
                income: 0, 
                costs: {
                    buyTanks: {
                        count: Kazs - Ktank, 
                        price: (Kazs - Ktank) * CcostTank
                    }, 
                    total: (Kazs - Ktank) * CcostTank
                },
                total: -((Kazs - Ktank) * CcostTank)
            }
        }
        
        function getBeforeN() {
            return {
                income: 0,
                costs: {
                    salary: Kazs * (Cdirect + Cchecker + Csecurity),
                    service: Kazs * Cazs,
                    total: Kazs * (Cdirect + Cchecker + Csecurity + Cazs)
                },
                total: -Kazs * (Cdirect + Cchecker + Csecurity + Cazs)
            }
        }
        
        function setNewDeltaVstorage(deltaVstorageNew) {
            deltaVstorage = deltaVstorageNew;
        }
        
        this.step = step;
        this.setNewDeltaVstorage = setNewDeltaVstorage;
        this.data = [];
    }
}

connection.connect(function(err){
    if (err) {
      return console.error("Ошибка: " + err.message);
    }
    else{
      console.log("Подключение к серверу MySQL успешно установлено");
    }
});

var userData = [];

app.get('/startSimulation', (req, res) => {
    if (req.query.simid == undefined) {
        res.status(500).send("Wrong request");
        return;
    }
    connection.execute("SELECT * FROM best.simulations LEFT JOIN best.fuel_supplies ON best.simulations.id = best.fuel_supplies.idsim WHERE best.simulations.id=" + req.query.simid,
        function(err, results, fields) {
            if (err != null || results.length != 1) {
                res.status(500).send("Error with searching");
                return;
            }
            
            r = results[0]
            
            simObj = new BuisnessLogic(r["average_price"], r["staitions_count"], r["tanker_count"], r["serving_place_setup_time"], r["tanker_delivery_time"], r["tanker_price"], r["director_coast"], r["cashier_coast"], r["security_coast"], r["attendant_coast"], r["basic_station_maintenance_cost"], r["additional_station_maintenance_cost"], r["fuel_per_client_coef"], r["fuel_per_serving_place_coef"], [r["junuary"], r["february"], r["march"], r["april"], r["may"], r["june"], r["july"], r["august"], r["november"], r["december"]], r["remaining_storage_fuel"], r["remaining_station_fuel"]);
            res.send({id: userData.length});
            userData.push(simObj);
    });
})

app.get('/nextstep', (req, res) => {
    if (req.query.simid == undefined) {
        res.status(500).send("Wrong request");
        return;
    }
    console.log(userData[req.query.simid])
    userData[req.query.simid].data.push(userData[req.query.simid].step());
    console.log(userData[req.query.simid].data)
    res.send(userData[req.query.simid].data);
});

app.get('/getdata', (req, res) => {
    if (req.query.simid == undefined) {
        res.status(500).send("Wrong request");
        return;
    }
    res.send(userData[req.query.simid].data);
});

app.post('/setNewDeltaVstorage', (req, res) => {
    if (req.body.id == undefined || req.body.data == undefined) {
        req.status(500).send("Wrong request");
        return
    }
    userData[req.body.id].setNewDeltaVstorage(req.body.data);
    res.send({id: req.body.id, data: userData[req.body.id].data});
});

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})

const months = ["January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ]

const month_select = document.getElementById("month")
const day_select = document.getElementById("day")
const year_select = document.getElementById("year")

for(const [index, element] of months.entries()){
    month_select.innerHTML += `<option value="${index + 1}">${element}</option>`
}

for(let i = 1; i <= 31; i++){
    day_select.innerHTML += `<option value="${i}">${i}</option>`
}

for(let i = 1990; i <= 2029; i++){
    year_select.innerHTML += `<option value="${i}">${i}</option>`
}
var d = new Date();
var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
var currentdate = new Date(utc + (3600000 * +7));
var hours = currentdate.getHours();
var minute = currentdate.getMinutes();
var day = currentdate.getDay();

// miền bắc
if (hours < 18) {
    $('.live_mb .icon-live-wait').show();
} else if (hours == 18) {
    if (minute >= 10 && minute <= 40) {
        $('.live_mb .icon-live-wait').show();
    } else if (minute > 40) {
        $('.live_mb .icon-live-done').show();
    } else {
        $('.live_mb .icon-live-wait').show();
    }

} else if (hours > 18) {
    $('.live_mb .icon-live-done').show();
}

// miền trung
if (hours < 17) {
    $('.live_mt .icon-live-wait').show();
} else if (hours == 17) {
    if (minute >= 10 && minute <= 40) {
        $('.live_mt .icon-live-wait').show();
    } else if (minute > 40) {
        $('.live_mt .icon-live-done').show();
    } else {
        $('.live_mt .icon-live-wait').show();
    }

} else if (hours > 17) {
    $('.live_mt .icon-live-done').show();
}

//  miền nam
if (hours < 16) {
    $('.live_mn .icon-live-wait').show();
} else if (hours == 16) {
    if (minute >= 10 && minute <= 40) {
        $('.live_mn .icon-live-wait').show();
    } else if (minute > 40) {
        $('.live_mn .icon-live-done').show();
    } else {
        $('.live_mn .icon-live-wait').show();
    }

} else if (hours > 16) {
    $('.live_mn .icon-live-done').show();
}


// Thần Tài 4 - every day at 16:30
if (hours < 16) {
    $('.li-thantai .icon-live-wait').show();
} else if (hours == 16) {
    if (minute < 30) {
        $('.li-thantai .icon-live-wait').show();
    } else {
        $('.li-thantai .icon-live-done').show();
    }
} else {
    $('.li-thantai .icon-live-done').show();
}

// Điện toán 123 - every day at 16:30
if (hours < 16) {
    $('.li-dientoan123 .icon-live-wait').show();
} else if (hours == 16) {
    if (minute < 30) {
        $('.li-dientoan123 .icon-live-wait').show();
    } else {
        $('.li-dientoan123 .icon-live-done').show();
    }
} else {
    $('.li-dientoan123 .icon-live-done').show();
}

// Điện toán 6x36 - only Wednesday (3) and Saturday (6) at 16:30
if ((day === 3 || day === 6) && hours < 16) {
    $('.li-dientoan6x36 .icon-live-wait').show();
} else if ((day === 3 || day === 6) && hours === 16) {
    if (minute < 30) {
        $('.li-dientoan6x36 .icon-live-wait').show();
    } else {
        $('.li-dientoan6x36 .icon-live-done').show();
    }
} else if ((day === 3 || day === 6) && hours > 16) {
    $('.li-dientoan6x36 .icon-live-done').show();
}

// Mega 6/45 - Wednesday, Friday, Sunday at 18:00 (days 0, 3, 5)
if ((day === 0 || day === 3 || day === 5) && hours < 18) {
    $('.li-mega645 .icon-live-wait').show();
} else if ((day === 0 || day === 3 || day === 5) && hours === 18) {
    if (minute < 30) {
        $('.li-mega645 .icon-live-wait').show();
    } else {
        $('.li-mega645 .icon-live-done').show();
    }
} else if ((day === 0 || day === 3 || day === 5) && hours > 18) {
    $('.li-mega645 .icon-live-done').show();
}

// Power 6/55 - Tuesday, Thursday, Saturday at 18:00 (days 2, 4, 6)
if ((day === 2 || day === 4 || day === 6) && hours < 18) {
    $('.li-power655 .icon-live-wait').show();
} else if ((day === 2 || day === 4 || day === 6) && hours === 18) {
    if (minute < 30) {
        $('.li-power655 .icon-live-wait').show();
    } else {
        $('.li-power655 .icon-live-done').show();
    }
} else if ((day === 2 || day === 4 || day === 6) && hours > 18) {
    $('.li-power655 .icon-live-done').show();
}
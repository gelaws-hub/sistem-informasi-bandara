<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Airport - Database</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABMlBMVEX////k6/BUVGX/4bI5OVDQ19z9yI5+VEn/16P/0mdVVWZsbnw3N0/i6u/o7/T/5LRcXGxIR1r2y2dCSGVOTmDK0Nf/2Gj/36xLSl3N198+PlR1SUEpKEP4+vv/158wL0mUblxsZWUmKkpITGXh4eNyRT/+zpb/x4guMU+wtb6HipZ3eYaRlJ9yamV2SDvq5OLJs5Xz1KjgwJn/6MUjKk8jIT+5v8ahpa5jX2VlZnX/+vO6mHv/7ND/8dzy17Svk1zMrGb/3WfMvrtcRk10UEqikYGGeXKQbma2oovAr6vJqIeQaFivi3L0y5/o18Hc186DcVd1ZlZZUVOYgVndt2I2QWWmj2a8oGZAM0VOQE6njYeTbFvEooOkf2j+8+frzrAREDb42pugg00XHUPXsmFgVlOavu8jAAAQwUlEQVR4nOWdfV/bthbHSYjJA44Tg0nShBBICM1TWRNIgEJXtg7WAXftOrruia5bd9//W7iSH2VZki3Htsznnv2xEDuyvj5HvyPJrrSykoC1gSnQMqbBz+C7JK4duwG0TKYMqcrlDGJl4xsIKrqK4Q3ClU08hkHOx0hp0AU0eObjomwrvlAkzMcCaTe8EIyPAbKNKQo/ZaoZ28pSdJal1pER8QErp5IxOj6ImD7GSPkMyHQxKsvJCxmxrIjGsq0dOZ0FmQ43hkrvQRHTEKqRN0CcUTBfbAHqmFg3tuN1oGEiW2PMEWojCovURPAME8KXQBN0TESkJtIERSImDJg8YkIaIw4xcQ8mjSgEMElEQYDJIQoDTAxRGB+0JAAFyChiCXTgYhwNpgNRYCM0LPamKJgPWryAomMUWqxxmuh4gmaxxukSOqrgFp4wRieGlRkIJC2Gk9F4Hdp4NBkupPCUMToxlAsVpbyYnKmq2tA0LQsN/L8B/j6bLMqhIGN0Yhi8zHDcaBhkuGmNxniYCQMZFyC/zijShIZnQ04kfsS4wpS3Jkp5pLLwTEh1VOYuOSZCzlaoDAPwGY4cciKW4wHkC1KlvK4SaHqbPcK36jqnG+MJ0+CEMBGUqwQH9k4v7y9PCYxatcyVPeIhDHJ9PZeXtxbDExKg9qxWK9Zqz0iHqjBHloN2BuJpiD7Z0EjrJ5P1akOlCehGEdoG8SCQVVWrro9OjM4AEzOmjMi4pgE3JqBtIvbhVU0nrL36gH6NgcLewPpkKDEhkyWEnZZRFXZZvI6pbqBWtMz1bZXoULU6GtK7PAlGKcAbjlVqVq/Win5WIxGalGMKZIJRqkgjZqfltAaMhQfslP5z0DZHxC5PPITebKGUJ35JfW9v75SOWDsFx9kFaOok42WMqduGR6kikVKCxz4wCD8E+H2j6ukOxNSn8TRE5SxQr2zzG3Kkgm+/2fT/OXDjOkYY2/AJGwArW6RuGcFgpF56AC/9I9QyFWuL8Q2B3U4MTAhs8xL3Yu2S1EGlEG65COOcxghN2Lt0hSoM0CUI4wN0xykPYXbv2bNne1bK39D/Cv5jN2G8c8JonHIRQuv9YvbafgnuPi9h3JPeiBe5CbM9s+fNCegijP/lGgeRn1DbK4LRU/E02NCfSJjEE8R2eEIwCvx4/7HEC4gSJvOIVAlNCAK1xxuiKGFy7yoooQlDmUmY6Ott8L3uZAkFvL7XTpRQzBuY+4kR7gvh+/8kLOHmHNI8ltUoPyrhxQomRKqlwRlBYE3dcrrJPmaclTN+An/cMKa0UFqBhLACcPbPwHHqm7M/cJj9a7McSAxpSyVxhE21adQrDFAAZAMbXEUY4TwWMK/NRRG2txMi3BYEuLIySQZxeyKMcOWskwBg50wc4MoPv8ajMajJv/4gkPDbw9dyvIyy/PrwW6GE+e9+i5FRln/7Ln/4ViDh28N8PjZGWefLiyX8ChICe92UI6aEeK+Nwg+/EkjYNgkh5Hu5O4iGUh505fevv7NKPhT5DxARwtZs9fnV6XF30FnCm7LcGXSPT6+er85a+VQQruQdwmkF2uzNdXagc/LCQbaBdv1mppczdQjzIgFXbp16VFahwdqtTp9fXZ/K3W53AD3K8Ck82BkMwJny6fXV86nxc92cgm+FEn5v1+PBrJmFCdwwe/7m6nrvVGvK3ePjLm7gK7mpne5dX715PjMCAC1i1y75+3QQts6R6rlAjXpPAS9qs+kUP8X92/NWOgh/twlvvLUk0SLGPv/GJvxdKOEPlpi2Zuwa81rFFtNDkd1ShLAfKR+waUoIv7V9GK0LgRP7FqHIjjdC+EfkhPl0EFodU1eyiIbwwSIU2S11CEnJYknCu1a6CH2SRQhCK12I7Za++GQRRpwskHRx+Ekc38Vq3VK8/jQ2wn6lvioIcrWOKF7EfKtIQgT3rn4hAvBIv9O3TjWiNrPkW1h0/WXygC/qOuFuK550aN+81q5RdPKEL41qTHf7saRDa/zU3zVaeD35pnhk1qMyu23FkA5hQgQOvJ1ZY5DkW+KRXZPKTb4feToE5f7Zz984Y6wjcYSQ8TzydAhT/jk6hhRKCBkjB8QLTT5KL2JgYlny6eJlPVFAAVr6IllCAflwJVnA5IUGk5rYTUCvLdmGWH8hgHAlSUIRQZpomIoYWgD7lKAThQAm6ERBLkzSiYIAE3OiGCE1LBlAUTEKLYmum5hZKAcRTrjV4xpnwPsn1IO6vTy6+BTTUOri08XRhcA2iFqAaHWe+wZ5BAxNpMB4zUdVAc/s7o/bh/NpZbUyPX+43T2f+UKK6anRjJkaK5XZQ6sFJ1Zb/ZvKeV//1MrfzZiM6XIh3YnwrZPzvPP6T+vPvvP59s8pHTJdLiQ4cWq8IjO92e0jrzdh1mrt3pjnTXEXCnzkRDbcidP+7t3Dbr6F4+16IPMPD3e3rbS70OtE+xmum+d2lfAtDF4sWtPWCqF5WiKBo/9gP+lw2y3eHNPnQm9OrMxQklbLUE9DWY0/nYN5/AFrGl3onbipTB92DQMN7fxGfzvPOADf6rs5v3uwjt95AIV31ciGRxrrPTb2K25pjFFokY000hmj0C6iQUxrjEKLZtCf1hjVLRJC0RBMi2ByKr2N0LCl5/rT1x/FbdnhfopVxrLCUoA7KY9RYC92lonTwtPHQFgIjVgprD0OwrCIAHDtaeqFZuUTIAyJeLD2KAhfQsJCGLmBgGtP06+lFwbhQYHvJSIYoTqh2Dn8IHZkEBbWDvgdCO1r0QBMUzLtldWCaQdrwUO1sGZbQS8lpSZBq+84iAeBFKdSP3AA1w70UkSjkE0ybIogBmF08ZmA6USUJBIiCLs6XXMq9QKKt/b0P3YponG8ZldNevK1G3HtgJIf6wWX+yDgEym1iJJERNyxo0/vBtgTT/XCDkYHAf96ghYjGsltksue/GgjFnAML5gN+OMTdzGioVCTpOCIgQFThNjGawYQ3zqIdK+5AN96AFODuO+tGUQs8CGSACVJ1AJRjrW3RrnPW0REyUH0j9QDiQi49bk52RLYw2kP1zvzjtyZkConoYnRz40UQGkCSp93xgshkPsn1fm2vkyUnMv4I7LciOR5t2WMheA62/PqScLxujVqzp21PbaHZXINkcTIcOPTKdmBUnloryUGXNkcJRWvL46uunPX0iXymUJxggtxhwL4FwVQUs5cV+nMu1dHsU/j7J9sFGuXx9gSJdsSFRFJjGQ3EtKgBSjhy8EdX9aKGzHGa/vi73efv9wXi8VjbD2WzkShxCmG6G2NdMCyMsFWg5O7xWLt/svnn/++iCFelcU6KP7f48HPtWLtpwG+zIyiELOi5M793lAl5nnd9hUFX9hm8A5c++fB8X2tWFxfRLqu8KfKxj9fvsANHJpyExTvDdOhQtNTV+73hCoVUMooQ2+QgpvclFW9Bl/+2ahEMy8HcvoxXCn+2L6D4C98ySugNRk6olSgMNLSIATMuHVGjxQkijrHG7BSk62lAffn8073FSjzvQxBKWEKtSZDa4qSOzE6jAzAcsarM+gtPpb/C/541e3Ml1/5EzQGo7SBHiQ5M0iwqwOtoTuRgAgYqXnedCGuM1aQgmZSu+wO4F3/L6hbbmknjsCFYETcu8IUJ8x14Krp9Bq7EqMhOV9THQgBMwoOCGPIkTojSOGtXZpQmudyZpgO6Gqqaw0rTrGsUdihZgkJxihBZ5AbvDGQ3+thFc3ytE1XmBZ1LfMmfV1rMrSU4UH0A/TqTG4A9/+wrj4w7jloM8sDrozNMEXUdOPjT5412OYSO05diDv0LCEZMSp51yg+frVx7wnS8fKAQ+DDnK2mtdq/g4a22fUuMtcZ6fsXsBDt3O8LSNAZ6MVNrTH4t1YrfjGDCoROc7Es4KJZgjFoaHP31cdn2VIp6714ztQaVlN0cj8TUN8DxaMzhsGLX3+EFTGCNJcrNZfMiFIzW1JhhGzUih83s72eljW+8Nq2sV0qoynC3L8D/qOnQWD7OqBHZwxT4QrpvV5287JYg0EKv1husW+lAYA0cK/kdz/1etZ698SLm1rDjFMJJsYp+wRj+xOPzlhONJfi72nX72Cm1iDyMt1wY2O1ZgNgIpvDkC9uao0f4l9BAAk64yLU1/AvZRtN/dMSanPSMDcvcG+A0CRf3dQaZlOUFr0F67CxERFRZ6A1sZoYf6rDsIDU/SsoYSqb+/mwADVNYyGae/TQFgSl1Cf0zgK07TNB3BJrsG1tzUwHhEHRoCOagGSdkZu06mgh1zQf0rcgKTWIVTC1hhqnC3P3eBqiuVkWRWcanp09HCeGyortBrVAgEh0o6U1lJSxsG4ZxYsWIElngAPpgOCmhSGcsLfWKmnealhaQ47ThVMg2YvWXmAjgs5oLD5wz074ARVq1Dtu9NxoS2tIiAs0JkhetH/r1Rm2A6Gp/EnxxH93NG/WsLXG2xT3XQVqJ55AtnasI+mM390Gt4w7Y7TDAObkqr0FHE6gYIT4DOu+9UOlSmjh/ohVXsKF715OxLw/d/ZExULQQ4ifYAGS+zO+iCpvD3w9FCCiNW7EDIEwQwIk60wARG3EB+i7HRel54ZoDdoUYc1dUaEu3ONlZPNPWn/GD5FTa4asZEgHRLUGATCcM3bKbIwVwhmM/kwARM4wHbOFhgqIao0NYFXezrDaRCGeAU8q0deoZyNqfLNu7CClA7q0xoxTu/J2S9RbIYKI7N5KHTf5I3KpKbMZ0kZPhqFaAxjLSO1PrDBtnCjEM+g6YyGyEn+TpyEuGM2w1GBu7CDnMhQjRanH2BucyYzed1bleTmF1aGhTNPYhmqNm3BkE45op9B1xjCVQcjVrWEJjR+hS2tc1bdL1ca0U0j9maCEGk/vm73xPbsSLq1xVd/pRVAI2ToDjVUtrpxPH91nfRsipjVI/c/sItYpZ7B1ht0Ms9p6VIQgTtlyIBOrjxLSApm9CY/MilFgPHMZbEKffEHVGqd+VfIt8NEZZq7I8iVEH0KfpkjRmjIyxi+TTvDTGb9KRUmoz4MznLhFQiwj/VISobLFdKHsM5ERsQ/ZTZGsNUhHSd0nHGfrjF8jjJrQpymStEaREEJiQgnfYYuDkN0USVqDbuOtEsKYqTNyzh8wakLSbKJTIYLWKEhnt7EgHGfqjG8jjJ6QnfgJWuNDyNQZdqqPi5CpNgStUZB5g4Y3ilk6E0BlYiFkqs22FwEZsCBDYPsww4UBVCYeQpbaeLWGTcjUmYC1iYGQkfi9WqMgD0K8Q2CGzvin+vgIWU1xjmuNMwAmDIGVLeq4KZjKxEXIaIoerVGQYbVnCMzQmYCNMC5CRlPEtUZBp9HxASJVZ+gPfhMjpCZ+XGuQ4SEYymHH6Drj/4QobkKq2uBao6DRVsKO0XQmeCPkJGTP02CINLXBtEZxPZlxH6LpTMBUb5bJM8YfcRD6vl9jmesZcDCdCa4yWc6ZKNaMMMHI1ct1XBhlF6F7CEwTUq5acL2Q0fZ9PooarSm6tUZyPV1DHsZQdSZwqjfL5Hq8NuFyIqUpurRGwQjRQ2Sd4WqE/K9jcBVOa4qo1qADYPcQmKYzXI0wq/E+yN9v8IgNpSmiWqNgb5sgR4g6w5Pq9RK5323b1yJQG0Rr6IQUneHjK4V5ee9E5fEjMuJ3PiFao7genDfQA6jOWL+VOe6vpqohXomC1l6M1oObLhdNy1TDnN4Z4V0M88CZapn1YyhSHFeeMP+d8P8A65O3zWa3QEEAAAAASUVORK5CYII=" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      AIRPORT
    </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="pilot-all">Pilot</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesawat-all">Pesawat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hangar-all">Hangar</a>
                    </li>
                </ul>
                
            </div>
        </div>

    </nav>
    <div class="container">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
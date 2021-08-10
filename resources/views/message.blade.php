<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Laravel</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="mx-auto" style="width: 40rem;">
            <div class="d-flex flex-column p-4 mt-5 border border-success rounded">
                <h1 class="text-center">Message App</h1>
                <form method="post" action="/message">
                    @csrf
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input name="number" class="form-control" id="number" type="text" placeholder="Please input your phone number" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="message">Message</label>
                        <input name="message" class="form-control" id="message" type="text" placeholder="Input a message" required/>
                    </div>
                    <input type="submit" class="btn btn-primary mt-2" />
                </form>
            </div>
            <div class="border border-primary rounded p-4 mt-2 mb-4">
                <h1 class="text-center">WhatsApp</h1>
                <div class="p-3">
                    <img src="{{asset('/images/scan-barcode.png')}}" alt="qr-barcode" class="d-block mx-auto">
                </div>
                <div class="text-center">
                    <p>Before using this app, must scan the QR code, or
                        <a href="https://web.whatsapp.com/send?phone=14157386170&text=Join%20aids%20crane" target="_blank">
                            click this link
                        </a>
                        , and hit send on the pre-filled message.
                    </p>
                    <p>Or</p>
                    <p>Send a WhatsApp message to <b>+14157386170</b> with the passphrase <b>Join aids crane</b></p>
                </div>
            </div>
        </div>
    </body>
</html>

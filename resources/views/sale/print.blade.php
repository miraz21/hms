<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Tax Invoice</title>
    <link rel="shortcut icon" type="image/RMGH.png" href="./RMGH.png" />
    <style>
        * {
            box-sizing: border-box;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            word-break: break-all;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        .h4-14 h4 {
            font-size: 12px;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .img {
            margin-left: "auto";
            margin-top: "auto";
            height: 30px;
        }

        pre,
        p {
            /* width: 99%; */
            /* overflow: auto; */
            /* bpicklist: 1px solid #aaa; */
            padding: 0;
            margin: 0;
        }

        table {
            font-family: arial, sans-serif;
            width: 100%;
            border-collapse: collapse;
            padding: 1px;
        }

        .hm-p p {
            text-align: left;
            padding: 1px;
            padding: 5px 4px;
        }

        td,
        th {
            text-align: left;
            padding: 8px 6px;
        }

        .table-b td,
        .table-b th {
            border: 1px solid #ddd;
        }

        th {
            /* background-color: #ddd; */
        }

        .hm-p td,
        .hm-p th {
            padding: 3px 0px;
        }

        .cropped {
            float: right;
            margin-bottom: 20px;
            height: 100px;
            /* height of container */
            overflow: hidden;
        }

        .cropped img {
            width: 400px;
            margin: 8px 0px 0px 80px;
        }

        .main-pd-wrapper {
            box-shadow: 0 0 10px #ddd;
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }

        .invoice-items {
            font-size: 14px;
            border-top: 1px dashed #ddd;
        }

        .invoice-items td {
            padding: 14px 0;

        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }

        @page {
            margin: 0;
        }
    </style>
</head>

<body>
    @php
        $discount = 0;
        $payment = 0;
        $payment_due = 0;
        foreach ($sale->customers as $key => $value) {
            $discount += $value->discount;
            $payment_due += $value->due_amount;
            $payment += $value->pay_amount;
        }
    @endphp
    <section class="main-pd-wrapper" style="width: 450px; margin: auto">
        <div
            style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                ">
            <p style="font-weight: bold; color: #000; margin-top: 15px; font-size: 18px;">
                Razwan Mollah Specialized Heart Center
            </p>
            <h6 style="font-weight: bold; margin: 15px auto; font-size: 18px;">
                C&B Ghat Road <br>
                Faridpur Sadar, Faridpur
            </h6>
            <p>
            <h6 style="font-weight: bold; margin: 15px auto; font-size: 15px;">Help Line:</b> +8801700778300 </h6>
            <p style="font-weight: bold; margin: 15px auto; font-size: 15px;">Patient Name:
                {{ $sale->appointment->appoint_name }}</p>
            <p style="font-weight: bold; margin: 15px auto; font-size: 15px;">Invoice No:
                {{ $sale->invoice_no }}</p>

            <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
        </div>
        <table style="width: 100%; table-layout: fixed">
            <thead>
                <tr>
                    <th style="width: 50px; padding-left: 0;">Sn.</th>
                    <th style="width: 150px;">Medicine</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sale->item as $key => $item)
                    <tr class="invoice-items">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->medicinedetail->medicinename->name }}</td>
                        <td>{{ number_format($item->quantity) }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ number_format($item->amount, 2) }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        <table style="width: 100%;
              background: #fcbd024f;
              border-radius: 4px;">
            <thead>
                <tr>
                    <th>Subtotal</th>
                    <th style="text-align: center;">Item ({{ $sale->item()->sum('quantity') }})</th>
                    <th>&nbsp;</th>
                    <th style="text-align: right;">{{ number_format($sale->total) }}</th>

                </tr>
            </thead>

        </table>

        <p style="margin-top: 5px">Discount: {{ $discount }}</p>
        <p style="margin-top: 5px">Total: {{ ($sale->total) - ($discount) }}</p>
        <p style="margin-top: 5px">Payment: {{ $payment }}</p>
        <P style="margin-top: 5px">Payment Due: {{ $payment_due }}</P>

        <button id="btnPrint" class="hidden-print " style="margin-top: 20px;">Print</button>

    </section>

    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>
</body>

</html>

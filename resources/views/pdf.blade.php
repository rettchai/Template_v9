<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
    .mt2 {
        margin: -4px;
    }

    .mt-table {
        margin: 2px;
    }

    body {
        background-image: url("{{ 'data:image/png;base64,' . base64_encode(file_get_contents('sample.png')) }}");
        background-color: #cccccc;
        background-repeat: no-repeat;
        height: 500px;
        background-position: center;
        opacity: 0.1;
    }
</style>

<body>
    <table cellspacing="0" cellpadding="0" border="0" style=" margin-left: auto; margin-right: auto;" width="700px"
        class="table table-light">
        <thead class="thead-light">
            <tr>
                <th align="left">
                    <h3>เล่มที่ ....................</h3>
                </th>
                <th>
                    <img src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents('krut-3-cm.png')) }}"
                        width="80px" />
                </th>
                <th align="right">
                    <h3>เลขที่ ....................</h3>
                </th>
            </tr>
            {{-- <tr>
                <th colspan="3">

                </th>
            </tr> --}}
            <tr>
                <th colspan="3">
                    <h1 class="mt2">ใบเสร็จรับเงิน </h1>
                    <h2 class="mt2">ในราชการมหาวิทยาลัยเทคโนโลยีราชมงคลรัตนโกสินทร์</h2>
                    <h2 class="mt2">กระทรวงศึกษาธิการ</h2>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3" style="border-bottom: 1px dotted  black;">
                    <table class="table table-light" cellspacing="0" cellpadding="0" border="0"
                        style=" margin-left: auto; margin-right: auto;" width="700px">
                        <tbody>
                            <tr>
                                <td width="10%">
                                    ได้รับเงินจาก
                                </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mt2 mt-table">
                        ได้รับเงินจาก

                    </p>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th align="right" colspan="3">
                    <p class="mt2 mt-table">
                        วันที่
                        ...........................................................................................................................
                    </p>
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="mt2 mt-table">
                        ที่อยู่
                        ...........................................................................................................................................................................................................................................................
                    </div>
                    <div class="mt2 mt-table">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ...........................................................................................................................................................................................................................................................
                    </div>
                    <div class="mt2 mt-table">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ...........................................................................................................................................................................................................................................................
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="3">#</th>
            </tr>
        </tfoot>
    </table>

    <table cellspacing="0" cellpadding="0" style=" margin-left: auto; margin-right: auto;" width="700px"
        class="table table-light">
        <thead class="thead-light">
            <tr>
                <th width="25%">

                </th>
                <th width="25%">

                </th>
                <th width="25%">

                </th>
                <th width="25%">

                </th>

            </tr>
            <tr style="border-top: 1px solid black;border-bottom: 1px solid black;">
                <th colspan="3">
                    <h3 class="mt2 mt-table">
                        ตามรายการดังต่อไปนี้
                    </h3>
                </th>
                <th style="border-left: 1px solid black;">
                    <h3 class="mt2 mt-table">
                        จำนวนเงิน
                    </h3>
                </th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td colspan="3">
                        <h3 class="mt2 mt-table">
                            --
                        </h3>
                    </td>
                    <td align="right" style="border-left: 1px solid black;">
                        <h3 class="mt2 mt-table">
                            ###,##.00
                        </h3>
                    </td>
                </tr>
            @endfor
            <tr style="border-top: 1px solid black;border-bottom: 1px solid black;">>
                <td colspan="2">
                    <h3 class="mt2 mt-table">
                        ยอดเงินภาษาไทย
                    </h3>
                </td>
                <td align="right">
                    <h3 class="mt2 mt-table">
                        รวมเงิน
                    </h3>
                </td>
                <td align="right" style="border-left: 1px solid black;">
                    <h3 class="mt2 mt-table">
                        รวม
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <h3 class="mt2 mt-table">
                        ไว้เป็นการถูกต้องแล้ว
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3 class="mt2 mt-table">

                    </h3>
                </td>
                <td colspan="2">
                    <h3 class="mt2 mt-table">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        (ลงชื่อ) .......................................................................... ผู้รับเงิน
                    </h3>
                    <h3 class="mt2 mt-table">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        (ตำแหน่ง) ..........................................................................
                    </h3>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>

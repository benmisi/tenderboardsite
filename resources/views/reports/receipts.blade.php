<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Tender Notice Board Invoice</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img  src="/img/tenderboad.png" style="width: 100%; max-width: 100px" />
								</td>

								<td>
                                    <div>Receipt</div>
									Receipt #: {{$receipt->receiptnumber}}<br />
									Created: {{$receipt->created_at}}<br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    Callapetrina PL<br />
									4 Cameron rd<br />
									Borrowdale, Harare
								</td>

								<td>
									
									{{$receipt->invoice->user->name}} {{$receipt->invoice->user->surname}}<br />
									{{$receipt->invoice->user->email}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

			
				<tr class="heading">
                    <td>Receipt Date</td>
                    <td>Invoice #</td>
					<td>Receipt #</td>
					<td>Amount</td>
				</tr>

				<tr class="item">
					<td>{{$receipt->created_at}}</td>
                    <td>{{$receipt->invoicenumber}}</td>
                    <td>{{$receipt->receiptnumber}}</td>
					<td class="text-right">{{$receipt->currency}}{{$receipt->amount}}</td>
				</tr>

			

				<tr class="total">
					<td colspan="3"></td>

					<td>Total: {{$receipt->currency}}{{$receipt->amount}}</td>
				</tr>
			</table>
            <h5>Bank Details</h5>
            <div>
            Account Name: Tender Noticeboard<br/>
            Bank: CBZ<br/>
            Account Number: 02925878600018<br/>
            Branch:Borrowdale
            </div>
		</div>
	</body>
</html>
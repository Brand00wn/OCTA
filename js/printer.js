function printData(id)
{
	var divToPrint=document.getElementById(id);
	newWin= window.open("");
	newWin.document.write(divToPrint.outerHTML);
	newWin.print();
	newWin.close();
}
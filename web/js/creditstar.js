var creditstar = {
	eventListeners: function(){
		$('.btn-import').click(function(){
			console.log('eventListeners');
			$('.creditstar-alert').remove();
			$(this).parent().append('<div class="creditstar-alert">By clicking this button you agree that ALL datas will be imported <a href="'+$(this).attr('href')+'">i agree</a></div>');
			return false;
		});
	},
	loans: {
		homePage: function(){
			$('.loans-index .grid-view').prepend(''
				+'<div class="creditstar-summary">'
					+'<div class="loans-total"><span>340 zł </span><span class="nb">nb</span><span class="caption">The sum include debt-related fees.</span></div>'
					+'<div class="loans-to-paid">'
						+'<span>Currently to be paid</span>'
						+'<span class="main">--</span>'
						+'<span class="cost">--</span>'
					+'</div>'
				+'</div>'
			+'');
			
			$('.loans-index table thead tr th:last').before(''
				+'<th><a href="/web/index.php?r=loans%2Findex&amp;sort=dateLoanEnds" data-sort="dateLoanEnds">Paid</a></th>'
				+'<th><a href="/web/index.php?r=loans%2Findex&amp;sort=dateLoanEnds" data-sort="dateLoanEnds">To pay</a></th>'
			+'');
			$('.loans-index table thead tr th:visible:first').addClass('left-align');
			var mainLoan = 0, costLoan = 0;
			$('.loans-index table tbody tr').each(function(k, v){
				$('td:visible:first', this).addClass('left-align');
				
				var  
				date =  $('td:eq(1)', this),
				amount =  $('td:eq(2)', this),
				interest =  $('td:eq(3)', this),
				total =  $('td:eq(4)', this),
				paid =  $('td:eq(5)', this),
				_amount = parseFloat(amount.text().replace(/[^0-9.]/g,'')),
				_interest = parseFloat(interest.text().replace(/[^0-9.]/g,'')),
				_interest = _interest * (_amount / 100);				
				amount.text(amount.text()+' €');
				interest.text(_interest.toFixed(3)+' €');
				total.text((_amount + _interest).toFixed(3)+' €');
				date.text(new Date(date.text()*1000).getMonth()+'.'+new Date(date.text()*1000).getDate()+'.'+new Date(date.text()*1000).getFullYear());
				if(k<2){
					$('td:last', this).before('<td>Paid</td><td>'+(_amount + _interest).toFixed(3)+' €'+'</td>');
					$(this).addClass('loan-paid');
				}else{
					$('td:last', this).before('<td>'+(((_amount/3)*2).toFixed(3)+' €')+'</td><td>'+(((_amount + _interest)-((_amount/3)*2)).toFixed(3)+' €')+'</td>');
				}
				
				mainLoan = mainLoan + _amount;
				costLoan = costLoan + _interest;
			});
			$('.loans-to-paid span:first').width($('.loans-index table thead tr th:visible:first').outerWidth());
			$('.loans-to-paid span.main').width($('.loans-index table thead tr th:visible:eq(1)').outerWidth());
			$('.loans-to-paid span.cost').width($('.loans-index table thead tr th:visible:eq(2)').outerWidth());
			$('.loans-to-paid .main').text(mainLoan.toFixed(3)+' €');
			$('.loans-to-paid .cost').text(costLoan.toFixed(3)+' €');
			$('.loans-total span:first').text((mainLoan + costLoan).toFixed(3)+' zł');
		}
	}
}

$(document).ready(function(){
	creditstar.eventListeners();
	if(location.pathname == '/web/index.php'){
		creditstar.loans.homePage();
	}	
});
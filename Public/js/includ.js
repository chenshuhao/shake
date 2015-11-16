$('.left').css('height',$(document).height())

$('.left-nav').find('.down-level').click(function(){
	if($(this).next().css('display') == 'none'){
			$('.left-nav1').each(function(){
				$(this).hide()
				$(this).prev().removeClass('active').find('span').addClass('glyphicon-plus').removeClass('glyphicon-minus')
			});
			$(this).addClass('active');
			$(this).next().show();
			$(this).find('span').removeClass('glyphicon-plus').addClass('glyphicon-minus')
	}else{
			$(this).next().hide()
			$(this).find('span').removeClass('glyphicon-minus').addClass('glyphicon-plus')
	}
});

//数量选择

$('#clickMlus').click(function(){
	var nowNum = parseInt($(this).next().val())
	if(nowNum > 1)$(this).next().val(nowNum-1)
})

$('#clickPlus').click(function(){
	var nowNum = parseInt($(this).prev().val())
	if(nowNum >= 500){
		alert('设备数量大于500,请联系客服人员')
		return
	}
	$(this).prev().val(nowNum+1)

})

function message_err($mes){
	$('.warning').show().html($mes)
	setTimeout(function(){
		$('.warning').hide()
	},3000)
}




<!--<?phpdefined('IN_MET') or exit('No permission');$page_type='pay';require_once $this->template('tem/head');require_once "topmsg.php";if($return){echo <<<EOT--><script type="text/javascript">	function jsApiCall() {		WeixinJSBridge.invoke('getBrandWCPayRequest', {$return['Parameters']}, function(res) {			WeixinJSBridge.log(res.err_msg);			alert(res.err_code + res.err_desc + res.err_msg)		})	}	function callpay() {		if (typeof WeixinJSBridge == "undefined") {			if (document.addEventListener) {				document.addEventListener('WeixinJSBridgeReady', jsApiCall, false)			} else if (document.attachEvent) {				document.attachEvent('WeixinJSBridgeReady', jsApiCall);				document.attachEvent('onWeixinJSBridgeReady', jsApiCall)			}		} else {			jsApiCall()		}	}</script><script type="text/javascript">	//获取共享地址	function editAddress() {		WeixinJSBridge.invoke('editAddress', {$return['Address']}, function(res) {			var value1 = res.proviceFirstStageName;			var value2 = res.addressCitySecondStageName;			var value3 = res.addressCountiesThirdStageName;			var value4 = res.addressDetailInfo;			var tel = res.telNumber;			alert(value1 + value2 + value3 + value4 + ":" + tel)		})	}	window.onload = function() {		if (typeof WeixinJSBridge == "undefined") {			if (document.addEventListener) {				document.addEventListener('WeixinJSBridgeReady', editAddress, false)			} else if (document.attachEvent) {				document.attachEvent('WeixinJSBridgeReady', editAddress);				document.attachEvent('onWeixinJSBridgeReady', editAddress)			}		} else {			editAddress()		}	};	</script><!--EOT;}echo <<<EOT--><div class="container-fluid">    <div class="container">        <div class="col-sm-12 wxpay-order-top">            <div class="col-sm-6 pull-left">                <h5>                    正在使用微信扫码支付交易                     <a data-toggle="tooltip" data-placement="right" title="若发生退款需联系收款方协商，如付款给陌生人，请谨慎操作。">[?]</a>                </h5>                <h4><strong>{$date["subject"]}</strong></h4>            </div>            <div class="col-sm-6 pull-right text-right">                <strong class="h3 red-font">{$date["total_fee"]}</strong>元            </div>        </div>        <div class="col-sm-12 collapse order-details" id="collapseExample">            <p>订单号： <span class="red-font" id="out_trade_no">{$date["out_trade_no"]}</span></p>            <p>商品名称： {$date["subject"] }</p>            <p>商品描述： {$date["body"]}</p>            <p>商品ID： {$date["product_id"]}</p>        </div>        <div class="col-sm-12 wxpay-order-details">            <span class="pull-right">                <a class="disabled order-ext-trigger" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">订单详情</a>             </span>        </div>        <div class="container text-center">            <button type="button" class="btn btn-success text-center" onclick="callpay()">立即支付</button>        </div>    </div></div><!--EOT;require_once $this->template('tem/foot');?>
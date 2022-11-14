<template>
    <div>
          <!-- <vue-element-loading :active="show" spinner="bar-fade-scale" color="#FF6700" background-color="rgba(255,255,255,1)" :is-full-screen="true"/> -->

        <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Refund Policy</h3>
                        <ul>
                            <li><router-link to="/">home</router-link></li>
                            <li>Refund Policy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    

    
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">   
            

<!-- <h2 style="text-align: center;"><b>TERMS AND CONDITIONS</b></h2>
<p>Last updated: 2021-05-04</p> -->
<p class="pt-5"><span class="bg-orange p-1 text-white">1.</span> <b>Returns</b></p>
<p>Our policy lasts 30 days. If 30 days have gone by since your purchase, unfortunately we can’t offer you a refund or exchange.</p>
<p>To be eligible for a return, your item must be unused and in the same condition that you received it. It must also be in the original packaging.</p>
<p>Several types of goods are exempt from being returned. Perishable goods such as food, flowers, newspapers or magazines cannot be returned. We also do not accept products that are intimate or sanitary goods, hazardous materials, or flammable liquids or gases.</p>
<span>Additional non-returnable items:</span>
<ul style="list-style:disc" class="pl-4 mb-2">
    <li>Gift cards</li>
    <li>Downloadable software products</li>
    <li>Some health and personal care items</li>
</ul>
<p>To complete your return, we require a receipt or proof of purchase.</p>
<p>Please do not send your purchase back to the manufacturer.</p>
<p>There are certain situations where only partial refunds are granted: (if applicable)
Book with obvious signs of use
CD, DVD, VHS tape, software, video game, cassette tape, or vinyl record that has been opened.
</p>
<p>Any item not in its original condition, is damaged or missing parts for reasons not due to our error.</p>
<p>Any item that is returned more than 30 days after delivery</p>
<p><span class="bg-orange p-1 text-white">4.</span> <b>Refunds (if applicable)</b></p>
<p>Once your return is received and
inspected, we will send you an email to notify you that we have
received your returned item. We will also notify you of the approval
or rejection of your refund.</p>
<p>If you are approved, then your refund
will be processed, and a credit will automatically be applied to your
credit card or original method of payment, within a certain amount of
days. 
</p>
<p><span class="bg-orange p-1 text-white">5.</span> <b>Late or missing refunds (if
applicable)</b></p>
<P >If you haven’t received a refund yet,
first check your bank account again.</P>
<P >Then contact your credit card company,
it may take some time before your refund is officially posted.</P>
<P >Next contact your bank. There is often
some processing time before a refund is posted.</P>
<P >If you’ve done all of this and you
still have not received your refund yet, please contact us at
<B><a href="mailto:nutriquickfoods@gmail.com">nutriquickfoods@gmail.com</a>.</B></P>

<P ><span class="bg-orange p-1 text-white">7.</span> <B>Sale items (if applicable)</B></P>
<P >Only regular priced items may be
refunded, unfortunately sale items cannot be refunded.</P>

<P ><span class="bg-orange p-1 text-white">8.</span> <B>Exchanges (if applicable)</B></P>
<P >We only replace items if they are
defective or damaged.  If you need to exchange it for the same item,
send us an email at <B><a href="mailto:nutriquickfoods@gmail.com">nutriquickfoods@gmail.com</a> </B>and send your item
to: <FONT COLOR="#222222"><FONT SIZE=2 STYLE="font-size: 10pt"><SPAN STYLE="background: #ffffff">
Shiv Farm, Nr. Ramji Temple, Gandhinagar, Gujarat, India-382330</SPAN></FONT></FONT>.</P>

<P ><span class="bg-orange p-1 text-white">9.</span> <B>Gifts</B></P>
<P >If the item was marked as a gift when
purchased and shipped directly to you, you’ll receive a gift credit
for the value of your return. Once the returned item is received, a
gift certificate will be mailed to you.</P>

<P >If the item wasn’t marked as a gift
when purchased, or the gift giver had the order shipped to themselves
to give to you later, we will send a refund to the gift giver and he
will find out about your return.</P>

<P ><span class="bg-orange p-1 text-white">10.</span> <B>Shipping</B></P>
<P >To return your product, you should mail
your product to: <FONT COLOR="#222222"><FONT SIZE=2 STYLE="font-size: 10pt"><SPAN STYLE="background: #ffffff">
Shiv Farm, Nr. Ramji Temple, Gandhinagar, Gujarat, India-382330.</SPAN></FONT></FONT></P>

<P >You will be responsible for paying for
your own shipping costs for returning your item. Shipping costs are
non-refundable. If you receive a refund, the cost of return shipping
will be deducted from your refund.</P>

<P >Depending on where you live, the time
it may take for your exchanged product to reach you, may vary.</P>

<P >If you are shipping an item over $75,
you should consider using a trackable shipping service or purchasing
shipping insurance. We don’t guarantee that we will receive your
returned item.</P>


        </div>    
    </div>

    <!--contact area end-->
    </div>
</template>
<script>
import VueElementLoading from 'vue-element-loading';
export default {
    components:{
        VueElementLoading
    },
     mounted() {
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: 'smooth'
        });
        setTimeout(() => {
          this.show = false
        }, 2000);
    },
    data() {
        return {
            show:true,
        }
    },
  
    
}
</script>
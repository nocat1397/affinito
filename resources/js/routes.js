import Home from './components/Home.vue';
import Contact from './components/Contact.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import PDetails from './components/ProductDetail.vue';
import Cart from './components/Cart.vue';
import Wishlist from './components/Wishlist.vue';
import Order from './components/Order.vue';
import Payment from './components/Payment.vue';
import Wallet from './components/Wallet.vue';
import Policy from './components/Policy.vue';
import Refund from './components/Refund.vue';
import Terms from './components/Terms.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'contact',
        path: '/contact',
        component: Contact
    },
    {
        name: 'login',
        path: '/Login',
        component: Login
    },
    {
        name: 'register',
        path: '/Register',
        component: Register
    },
    {
        name: 'cart',
        path: '/cart/:id',
        component: Cart
    },
    {
        name: 'orders',
        path: '/order/:id',
        component: Order
    },
    {
        name: 'wallet',
        path: '/wallet/:id',
        component: Wallet
    },
    {
        name: 'wishlist',
        path: '/wishlist/:id',
        component: Wishlist
    },
    {
        name: 'Product-Details',
        path: '/product-details/:name',
        component: PDetails
    },
    {
        name: 'Payment',
        path: '/payment',
        component: Payment
    },
    {
        name: 'Terms',
        path: '/terms',
        component: Terms
    },
    {
        name: 'Refund',
        path: '/refund',
        component: Refund
    },
    {
        name: 'Policy',
        path: '/policy',
        component: Policy
    }

];
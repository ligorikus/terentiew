<template>
    <div>
        <div class="form-group row">
            <label class="col-12 col-sm-2 col-form-label">{{ $t('products.add') }}</label>
            <div class="col-12 col-sm-10 col-md-4">
                <dropdown
                    :options="product_list"
                    v-on:selected="validateSelection"
                    v-on:filter="getDropdownValues"
                    :disabled="false"
                    name="zipcode"
                    placeholder="Please select an option">
                </dropdown>
            </div>
        </div>
        <div class="form-group row" v-show="active_products.length">
            <div class="col-12 col-sm-12 col-md-8 row">
                <div class="col-5 col-sm-5 col-md-5"><span>{{ $t('products.product')}}</span></div>
                <div class="col-3 col-sm-3 col-md-3"><span>{{ $t('products.count')}}</span></div>
                <div class="col-2 col-sm-2 col-md-2"></div>
            </div>
        </div>
        <div class="form-group row" v-show="active_products.length">
            <div class="col-12 col-sm-12 col-md-8">
                <div class="form-group row" v-for="product in active_products">
                    <div class="col-5 col-md-5 col-sm-5">
                        <input type="text" disabled :value="product.name" class="form-control">
                    </div>
                    <div class="col-3 col-md-3 col-sm-3">
                        <input type="number" class="form-control" v-model.number="product.count" min="0" @input="validateProductCount(product)">
                    </div>
                    <div class="col-2 col-sm-2 col-md-2">
                        <button @click="removeActiveProduct(product)" class="btn btn-danger">{{ $t('actions.delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-2 col-form-label">{{ $t('products.to_employee')}}</label>
            <div class="col-12 col-sm-10 col-md-4">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="to_employee" v-model="to_employee">
                    <label class="custom-control-label" for="to_employee"></label>
                </div>
            </div>
        </div>
        <div class="form-group row" v-show="active_products.length && !to_employee">
            <label class="col-12 col-sm-2 col-form-label">{{ $t('wallets.payment_type') }}</label>
            <div class="col-12 col-sm-10 col-md-4">
                <select class="form-control" v-model="wallet">
                    <option v-for="wallet in wallets" :key="wallet.id">
                        {{wallet.type}}
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group row" v-show="active_products.length && !to_employee">
            <div class="col-md-10 row">
                <label class="col-12 col-sm-2 col-form-label">{{ $t('products.discount') }}</label>
                <div class="col-12 col-sm-10 col-md-2 percent">
                    <input type="number" @input="validateDiscount" v-model.number="discount" class="form-control" min="0" max="100">
                </div>
            </div>
        </div>
        <h2>{{ $t('products.total_cost')}}: <span v-if="!cost">{{total_cost}}</span><span v-else>{{cost}} <span>({{total_cost}})</span></span></h2>
        <button type="submit" class="btn btn-primary" @click="sell"
                v-show="active_products.length && ((wallet.length && total_cost > 0) || to_employee)">
            {{ $t('actions.save')}}
        </button>
    </div>
</template>

<script>
    export default {
        name: "TradeForm",
        props: {
            products: Array,
            wallets: Array,
            sell_route: String,
        },
        data() {
            return {
                product_list: [],
                active_products: [],
                wallet: '',
                to_employee: false,
                discount: 0,
                total_cost: 0
            }
        },
        created() {
              this.product_list = this.products;
        },
        methods: {
            validateProductCount(product) {
                if (product.count < 0) {
                    product.count = 0;
                }
                this.calc_total_cost();
            },
            validateSelection(selection) {
                if (selection !== undefined) {
                    selection.count = 1;
                    this.active_products.push(selection);
                    this.product_list.splice(this.product_list.map(function(e) { return e.id}).indexOf(selection.id), 1);
                    this.calc_total_cost();
                }
            },
            getDropdownValues(keyword) {

            },
            removeActiveProduct(product) {
                this.product_list.push(product);
                this.active_products.splice(this.active_products.map(function(e) { return e.id}).indexOf(product.id), 1);
                this.calc_total_cost();
            },
            validateDiscount() {
                if (this.discount > 100) {
                    this.discount = 100;
                }
                if (this.discount < 0) {
                    this.discount = 0;
                }
            },
            sell() {
                let wallet_id = this.wallets.find(elem => {return elem.type === this.wallet}).id;
                axios
                    .post(this.sell_route, {
                        products: this.active_products,
                        discount: this.discount,
                        to_employee: this.to_employee,
                        wallet: wallet_id,
                        cost: this.total_cost
                    })
                    .then((response) => {
                        document.location.href = response.data.route;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            calc_total_cost: function () {
                let result = 0;
                if (!this.to_employee) {
                    for (let product of this.active_products) {
                        if (product.count === undefined) {
                            continue;
                        }
                        result += product.price.price * product.count;
                    }
                }
                this.total_cost = result;
            }
        },
        computed: {
            cost: function () {
                if (this.discount > 0) {
                    return this.total_cost - this.total_cost*(this.discount / 100);
                }
                return false;
            },
            call_calc_total_cost: function () {
                this.calc_total_cost();
            }
        }
    }
</script>

<style lang="scss">
    .percent::after {
        position: absolute;
        right: -2px;
        top: 0;
        content: '%';
        opacity: 1;
        line-height: calc(1.6em + 0.75rem + 2px);
    }
    .red {
        color: #f00
    }
</style>

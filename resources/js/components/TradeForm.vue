<template>
    <div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">{{ $t('products.add') }}</label>
            <div class="col-sm-10 col-md-4">
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
            <div class="col-sm-12 col-md-8 row">
                <div class="col-sm-5 col-md-5"><span>{{ $t('products.product')}}</span></div>
                <div class="col-sm-3 col-md-3"><span>{{ $t('products.count')}}</span></div>
                <div class="col-sm-2 col-md-2"></div>
            </div>
        </div>
        <div class="form-group row" v-show="active_products.length">
            <div class="col-sm-12 col-md-8">
                <div class="form-group row" v-for="product in active_products">
                    <div class="col-md-5 col-sm-5">
                        <input type="text" disabled :value="product.name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <input type="number" class="form-control" v-model.number="product.count">
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <button @click="removeActiveProduct(product)" class="btn btn-danger">{{ $t('actions.delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" v-show="active_products.length">
            <label class="col-sm-2 col-form-label">{{ $t('wallets.payment_type') }}</label>
            <div class="col-sm-10 col-md-4">
                <select class="form-control" v-model="wallet">
                    <option v-for="wallet in wallets">
                        {{wallet.type}}
                    </option>
                </select>
            </div>
        </div>
        <h2>{{ $t('products.total_cost')}}: {{cost}}</h2>
        <button type="submit" class="btn btn-primary" v-show="wallet.length && cost > 0">{{ $t('actions.save')}}</button>
    </div>
</template>

<script>
    export default {
        name: "TradeForm",
        props: {
            products: Array,
            wallets: Array,
        },
        data() {
            return {
                product_list: [],
                active_products: [],
                wallet: ''
            }
        },
        created() {
              this.product_list = this.products;
        },
        methods: {
            validateSelection(selection) {
                if (selection !== undefined) {
                    this.active_products.push(selection);
                    this.product_list.splice(this.product_list.map(function(e) { return e.id}).indexOf(selection.id), 1);
                }
            },
            getDropdownValues(keyword) {

            },
            removeActiveProduct(product) {
                this.product_list.push(product);
                this.active_products.splice(this.active_products.map(function(e) { return e.id}).indexOf(product.id), 1);
            }
        },
        computed: {
            cost: function () {
                let result = 0;
                for (let product of this.active_products) {
                    if (product.count === undefined) {
                        continue;
                    }
                    result += product.price.price * product.count;
                }
                return result;
            }
        }
    }
</script>

<style lang="scss">

</style>

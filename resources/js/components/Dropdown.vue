<template>
  <div class="dropdown" v-if="options">

    <!-- Dropdown Input -->
    <input class="dropdown-input"
      :name="name"
      @focus="showOptions()"
      @blur="exit()"
      @keyup="keyMonitor"
      v-model="searchFilter"
      :disabled="disabled"
      :placeholder="placeholder" />

    <!-- Dropdown Menu -->
    <div class="dropdown-content"
         v-show="optionsShown">
      <div
        class="dropdown-item"
        @mousedown="selectOption(option)"
        v-for="(option, index) in filteredOptions"
        :key="index">
          {{ option.name || option.id || '-' }}
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Dropdown',
    template: 'Dropdown',
    props: {
      name: {
        type: String,
        required: false,
        default: 'dropdown',
        note: 'Input name'
      },
      options: {
        type: Array,
        required: true,
        default: [],
        note: 'Options of dropdown. An array of options with id and name',
      },
      placeholder: {
        type: String,
        required: false,
        default: 'Please select an option',
        note: 'Placeholder of dropdown'
      },
      disabled: {
        type: Boolean,
        required: false,
        default: false,
        note: 'Disable the dropdown'
      },
      maxItem: {
        type: Number,
        required: false,
        default: 6,
        note: 'Max items showing'
      }
    },
    data() {
      return {
        selected: {},
        optionsShown: false,
        searchFilter: ''
      }
    },
    created() {

    },
    computed: {
      filteredOptions() {
        const filtered = [];
        const regOption = new RegExp(this.searchFilter, 'ig');
        for (const option of this.options) {
          if (this.searchFilter.length < 1 || option.name.match(regOption)){
            if (filtered.length < this.maxItem) filtered.push(option);
          }
        }
        return filtered;
      }
    },
    methods: {
      selectOption(option) {
        this.selected = option;
        this.optionsShown = false;
        this.searchFilter = this.selected.name;
        this.$emit('selected', this.selected);
      },
      showOptions(){
        if (!this.disabled) {
          this.searchFilter = '';
          this.optionsShown = true;
        }
      },
      exit() {
        if (!this.selected.id) {
          this.selected = {};
          this.searchFilter = '';
        } else {
          this.searchFilter = this.selected.name;
        }
        this.optionsShown = false;
      },
      // Selecting when pressing Enter
      keyMonitor: function(event) {
        if (event.key === "Enter" && this.filteredOptions[0])
          this.selectOption(this.filteredOptions[0]);
      }
    },
    watch: {
      searchFilter() {
        if (this.filteredOptions.length === 0) {
          this.selected = {};
        } else {
          this.selected = this.filteredOptions[0];
        }
        this.$emit('filter', this.searchFilter);
      }
    }
  };
</script>


<style lang="scss" scoped>
    .dropdown {
        position: relative;
        display: block;
        margin: auto;
        height: calc(1.6em + 0.75rem + 2px);
        width: 100%;
        .dropdown-input {
            background: #fff;
            border: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
            border-radius: 3px;
            color: #495057;
            display: block;
            font-size: 0.9rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            background-clip: padding-box;
            width: 100%;
            &:focus {
                color: #495057;
                background-color: #fff;
                border-color: #a1cbef;
                outline: 0;
                box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
            }
        }
        .dropdown-content {
            position: relative;
            width: 100%;
            background-color: #fff;
            border: 1px solid #e7ecf5;
            box-shadow: 0px -8px 34px 0px rgba(0,0,0,0.05);
            overflow: auto;
            z-index: 1;
            .dropdown-item {
                color: black;
                font-size: 0.9rem;
                line-height: 1em;
                padding: 0.375rem 0.75rem;
                text-decoration: none;
                display: block;
                cursor: pointer;
                width: 100%;
                &:hover {
                    background-color: #e7ecf5;
                }
            }
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    }
</style>

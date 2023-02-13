<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>
    <div
        :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized, 'hidden': onSmallScreen }">
        <small>{{ trans('brackets/admin-ui::admin.forms.currently_editing_translation') }}<span
                v-if="!isFormLocalized && otherLocales.length > 1"> {{
                trans('brackets/admin-ui::admin.forms.more_can_be_managed') }}</span><span v-if="!isFormLocalized"> | <a
                    href="#" @click.prevent="showLocalization">{{
                    trans('brackets/admin-ui::admin.forms.manage_translations') }}</a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>

    <div class="col text-center"
        :class="{'language-mobile': onSmallScreen, 'has-error': !isFormLocalized && showLocalizedValidationError}"
        v-if="isFormLocalized || onSmallScreen" v-cloak>
        <small>{{ trans('brackets/admin-ui::admin.forms.choose_translation_to_edit') }}
            <select class="form-control" v-model="currentLocale">
                <option :value="defaultLocale" v-if="onSmallScreen">@{{defaultLocale.toUpperCase()}}</option>
                <option v-for="locale in otherLocales" :value="locale">@{{locale.toUpperCase()}}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            <span>|</span>
            <a href="#" @click.prevent="hideLocalization">{{ trans('brackets/admin-ui::admin.forms.hide') }}</a>
        </small>
    </div>
</div>


<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.product.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}"
            id="name" name="name" placeholder="{{ trans('admin.product.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('shortName'), 'has-success': fields.shortName && fields.shortName.valid }">
    <label for="shortName" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.product.columns.shortName') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.shortName" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('shortName'), 'form-control-success': fields.shortName && fields.shortName.valid}"
            id="shortName" name="shortName" placeholder="{{ trans('admin.product.columns.shortName') }}">
        <div v-if="errors.has('shortName')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('shortName') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.product.columns.price') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'required|decimal'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}"
            id="price" name="price" placeholder="{{ trans('admin.product.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.product.columns.description') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description"
                :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('sizes'), 'has-success': fields.sizes && fields.sizes.valid }">
    <label for="sizes" class="col-md-2 col-form-label text-md-right">{{
        trans('admin.product.columns.sizes') }}</label>
    <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
        <multiselect v-model="form.sizes" :options="{{ json_encode($sizes) }}" placeholder="Pick a value"
            v-validate="'required'" :multiple="true" open-direction="bottom">
        </multiselect>
        <div v-if="errors.has('sizes')" class="form-control-feedback form-text" v-cloak>{{'{{'}}
            errors.first('sizes') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('color'), 'has-success': fields.color && fields.color.valid }">
    <label for="color" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.product.columns.color') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.color" label="name" track-by="id" :options="{{ json_encode($colors) }}"
            placeholder="{{ trans('admin.product.columns.color') }}" v-validate="'required'" open-direction="bottom">
            <template slot="singleLabel" slot-scope="props">
                <div class="option__desc">
                    <span class="colorbox mr-2" :class="props.option.name"></span>
                    <span class="option__title">@{{ props.option.name}}</span>
                </div>
            </template>
            <template slot="option" slot-scope="props">
                <div class="option__desc">
                    <span class="colorbox mr-2" :class="props.option.name"></span>
                    <span class="option__small">@{{ props.option.name }}</span>
                </div>
            </template>
        </multiselect>
        <div v-if="errors.has('color')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('color') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('brand'), 'has-success': fields.brand && fields.brand.valid }">
    <label for="brand" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.product.columns.brand_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.brand" label="name" track-by="id" :options="{{ json_encode($brands) }}"
            placeholder="{{ trans('admin.product.columns.brand_id') }}" v-validate="'required'" open-direction="bottom">
        </multiselect>
        <div v-if="errors.has('brand')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('brand')
            }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.product.columns.type') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect v-model="form.type" :options="{{ json_encode($types) }}"
            placeholder="{{ trans('admin.product.columns.type') }}" v-validate="'required'" open-direction="bottom">
        </multiselect>
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('assets'), 'has-success': fields.assets && fields.assets.valid }">
    <label for="assets" class="col-md-2 col-form-label text-md-right">{{
        trans('admin.product.columns.assets') }}</label>
    <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
        <input type="text" v-model="form.assets" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('assets'), 'form-control-success': fields.assets && fields.assets.valid }"
            id="assets" name="assets"
            placeholder="{{ trans('admin.product.columns.assets') }}">
        <div v-if="errors.has('assets')" class="form-control-feedback form-text" v-cloak>{{'{{'}}
            errors.first('assets') }}</div>
    </div>
</div>

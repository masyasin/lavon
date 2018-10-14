<link rel="stylesheet" type="text/css" href="{{ theme_assets }}/global/plugins/icheck/skins/all.css">
<h1 class="page-title"> Transaksi Fasilitas Unit
    <small>cek in dan cek out fasilitas</small>
</h1>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa"></i>LOYALTY &amp; REWARDS MANAGEMENT SYSTEM </div>

</div>
<template id="member-template">

    <form v-bind:name="'member_'+$index" v-for="member in unit.members" class="prevent-submit">
       
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label col-md-2 text-muted text-left"><span v-if="$index==0">Member Details</span></label>
                    <input type="hidden" name="id" v-model="member.id" disabled >
                    <input type="hidden" name="id_unit" v-model="member.id_unit" disabled >


                    <div class="col-md-3">
                        <input type="text" class="form-control" name="status" v-model="status_member[member.status]" disabled /> 
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nama" v-model="member.nama" disabled >
                    </div>
                    <div class="col-md-1 padding-left-0">
                       
                        <button   class="button add-button btn btn-primary" @click.prevent="member.collapse = !member.collapse"><i v-bind:class="{'fa':1,'fa-caret-right':member.collapse,'fa-caret-down':!member.collapse, 'bold':1}"></i></button>

                        
                    </div>
                </div>

            </div>
        </div>

        <!--  -->
        <div class="row" v-if="!member.collapse">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <label class="control-label col-md-3 bold text-left">ID Number</label>
                    <div class="col-md-2"> 
                        <input type="text" class="form-control" name="jenis_identitas" v-model="jenis_identitas[member.jenis_identitas]" disabled /> 
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="nomor_identitas" v-model="member.nomor_identitas" disabled >
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="row" v-if="!member.collapse">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">Birth Date</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="tgl_lahir" v-model="member.tgl_lahir" disabled  data-provide="datepicker">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="!member.collapse">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">Phone Number</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="kontak" v-model="member.kontak" disabled >
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="!member.collapse">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">Email</label>

                    <div class="col-md-7">
                        <input type="email" class="form-control" name="email" v-model="member.email" disabled >
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="!member.collapse">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">Address</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="alamat" v-model="member.alamat" disabled >
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="!member.collapse">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">District</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="distrik" v-model="member.distrik" disabled >
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="!member.collapse">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <label class="control-label col-md-3 bold text-left">City</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="status" v-model="daftar_kota[member.id_kota]" disabled /> 
                    </div>

                </div>
            </div>
        </div>
    </form>                       
</template>

<div class="portlet-body form" id="app">
    <!-- BEGIN FORM-->
    <form id="formentry" action="#" class="form-horizontal prevent-submit">
        <div class="form-body">

            <!-- <h3 class="form-section">Data Input</h3> -->

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-2 text-muted text-left">Data Input</label>
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Type name or unit no. to search" name="ac_unit_number" id="ac_unit_number" v-model="ac_unit_number">
                        </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2 bold text-left">Card Number</label>
                            <div class="col-md-10">
                                <input disabled type="text" class="form-control" name="card_number" v-model="unit.card_number"> </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-2 bold text-left">Cluster Name</label>
                                <div class="col-md-10">
                                    <input type="hidden" name="id_cluster" v-model="unit.id_cluster">
                                    <input disabled type="text" class="form-control" v-model="unit.cluster_name"> </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 bold text-left">Unit Number</label>
                                    <div class="col-md-10">
                                        <input disabled type="text" class="form-control" name="unit_number" v-model="unit.unit_number"> 
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 bold text-left">Status</label>
                                    <div class="col-md-6">
                                        <input disabled type="text" class="form-control" name="status_pemilik" v-model="unit.status_pemilik"> 
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-info">History</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="member_list">
                        <div class="alert alert-warning" v-if="!has_valid_unit">No Members To Display, please specify unit number to display.</div>    
                        <members :unit="unit" 
                                 :daftar_kota="daftar_kota"
                                 :status_member="status_member"
                                 :jenis_identitas="jenis_identitas"
                                 :enable_editing="enable_editing"
                                 :has_valid_unit="has_valid_unit"
                                 :max_member_atempt="max_member_atempt"
                                 :parent="vm"></members>
                        </div> 

                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 bold text-left">Member Since</label>
                                    <div class="col-md-10">
                                        <input disabled type="text" class="form-control" name="tgl_berlaku" v-model="unit.tgl_berlaku" data-provide="datepicker"> 
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 bold text-left">Member Expired</label>
                                    <div class="col-md-10">
                                        <input disabled type="text" class="form-control" name="tgl_berakhir" v-model="unit.tgl_berakhir" data-provide="datepicker"> 
                                    </div>
                                </div>
                            </div>

                        </div> -->
                        
                <div class="row">

                <div class="col-md-12">
                    <!--  -->
                    <div class="m-grid m-grid-flex m-grid-responsive-xs m-grid-demo">
                        <div class="m-grid-row" v-for="fg in daftar_fasilitas">
                            <div v-for="f in fg" v-bind:class="{'font-white':1,'f-bg':1,'m-grid-col':1, 'm-grid-col-middle':1, 'm-grid-col-center':1}" v-bind:style="'background-image:url('+f.url_gambar+')'"><input @change="onSelectFasilitas(f.id)" type="checkbox" v-bind:value="f.id" data-checkbox="icheckbox_flat-blue" class="icheck id_fasilitas"><span v-text="f.nama" class="sp-text" v-bind:value="f.id" ></span></div>
                        </div>
                    </div>
                    <!--  -->
                    </div>
                </div>
                    </div>
                    <div class="form-actions">
                        <div class="col-md-12">

                            <button disabled type="button" class="btn btn-warning bold" @click="cancelEditing()">Cancel</button>


                            <button disabled type="button" class="btn btn-success fr margin-left-1em bold" @click="saveEditing(unit.id)">Submit</button>
                            
                            <button  :disabled="enable_editing || !has_valid_unit" type="button" class="btn btn-info fr bold" @click="toggleEnableEditing()">Edit</button>

                        </div>
                    </div>
                     <div v-if="$index>0 && !member.collapse" style="padding-top: 2em"></div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
<script src="{{ theme_assets }}/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{ theme_assets }}/pages/scripts/form-icheck.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $=jQuery;
            $vm={};
            
            $(document).ready(function(){
               $.fn.datepicker.defaults = $.extend($.fn.datepicker.defaults,{
                    format: 'dd/mm/yyyy',
                    // container: container,
                    todayHighlight: true,
                    autoclose: true,
               }); 

                $('form.prevent-submit').submit(function(event){event.preventDefault();return false;});
                Vue.component('members', {
                    props: ['parent','unit','daftar_kota','jenis_identitas','status_member','enable_editing','has_valid_unit','max_member_atempt'],
                    template: "#member-template",

                });
                var ac_unit = {
                    init:function(scope){
                        var e = function() {
                            var e = new Bloodhound({ 
                                    datumTokenizer: function(e) { 
                                        return Bloodhound.tokenizers.whitespace(e.unit_number); 
                                    }, 
                                    queryTokenizer: Bloodhound.tokenizers.whitespace, 
                                    local: scope.daftar_unit     
                            });
                
                            e.initialize();
                            App.isRTL() && $("#ac_unit_number").attr("dir", "rtl");
                            $("#ac_unit_number").typeahead(null, { displayKey: "unit_number", hint: !App.isRTL(), source: e.ttAdapter() }).bind('typeahead:select',function(ev,text){
                                scope.setUnit(text);
                            });
          
                        }
                        e();
                    }
                };
                $vm = new Vue({
                    el:'#app',
                    data:{
                        tr:{
                            id_fasilitas:0,
                        },
                        enable_editing:false,
                        daftar_kota : <?=json_encode($daftar_kota)?>,
                        jenis_identitas : <?=json_encode($jenis_identitas)?>,
                        status_member : <?=json_encode($status_member)?>,
                        daftar_unit : <?=json_encode($daftar_unit)?>,
                        daftar_fasilitas:<?=json_encode($daftar_fasilitas)?>,
                        has_valid_unit:false,
                        max_member_atempt:0,
                        deleted_queue_ids:[],
                        unit:{
                            members:[],
                            has_member:false,
                            unit_number:'',
                            card_number:'',
                            max_member:''
                        },
                        is_dirty:true,
                        ac_unit_number:'',
                        member_data_template:{
                            "id":"","id_unit":"","nama":"","jenis_identitas":"","nomor_identitas":"","tgl_lahir":"","kontak":"","email":"","alamat":"","distrik":"","id_kota":'',"status":""
                        },
                        vm: {}

                    },
                    ready: function(){
                        // INIT AUTOCOMPLETE
                        ac_unit.init(this);
                        this.$set('vm',this);

                        this.$nextTick(function(){
                            $('input[type=checkbox].icheck.id_fasilitas').each(function(i,ck){
                                var parent = $(ck).closest('div.icheckbox_flat-blue');
                                console.log(parent);
                                parent.find('ins').click(function(){
                                    var checked = parent.hasClass('checked');
                                    $('div.icheckbox_flat-blue.checked').not(parent).find('ins').trigger('click');
                                    console.log(checked);
                                });
                            });
                        });
                    },
                    methods: {
                        resetEditing:function(){
                            this.$set('max_member_atempt',0);
                            this.$set('enable_editing',false);
                            this.$set('has_valid_unit',false);

                        },
                        setUnit:function(unit){
                            var is_editing_enabled = this.$get('enable_editing');
                            if(is_editing_enabled){
                                if(!confirm('Are you sure want to cancel editing that are not already saved ?')){

                                    return;
                                }
                            }
                            this.resetEditing();
                            var url_proxy = site_url()+'transaksi/fasilitas-unit/details_card_numbers_fetch_unit_row_json/'+unit.id+'?uuid='+uuidv4();
                            this.$http({url: url_proxy, method: 'GET'}).then(function (response) {
                                var unit = response.data;
                                this.$set('max_member_atempt',unit.member_count);
                                this.$set('unit', unit);
                                //Or we as we did before
                                //vm.stories = response.data
                                this.$set('has_valid_unit',true);

                                if(unit.member_count < 1 && unit.max_member > 0){
                                    this.setEmptyMemberForm(unit);
                                }
                            })

                        },
                        toggleEnableEditing:function(){
                            // this.$set('enable_editing',!this.$get('enable_editing'));
                            // var textbox = $('input[name=card_number]');

                            // textbox.show("fast", function () {
                            //     textbox[0].focus();
                            // });
                        },
                        cancelEditing:function(){
                            // this.$set('enable_editing',false);
                        },
                        setEmptyMemberForm:function(unit){
                            // this.$set('max_member_atempt',1);
                            // var member = $.extend(true, {},this.$get('member_data_template'));
                            // member.id_unit = unit.id;
                            
                            // member.tgl_berlaku  = unit.tgl_berlaku;
                            // member.tgl_berakhir = unit.tgl_berakhir;

                            // unit.members = [member];
                            // unit.member_count = unit.members.length;
                            // this.$set('unit', unit);
                        },
                        addMemberFormInstance :function() {
                            // body...
                            
                            // var unit = this.$get('unit');
                            // var max_member_atempt = this.$get('max_member_atempt');

                            // if(max_member_atempt >= unit.max_member ){
                            //     console.log('can\'t addMemberFormInstance exceed max_member unit is ' + unit.max_member);
                            //     return;
                            // }
                            // console.log('addMemberFormInstance');
                            // var member =  $.extend(true, {},this.$get('member_data_template'));
                            // member.id_unit = unit.id;
                     
                            
                            // member.tgl_berlaku  = unit.tgl_berlaku;
                            // member.tgl_berakhir = unit.tgl_berakhir;

                            // unit.members.push(member);
                            // this.$set('unit', unit);
                            // unit.member_count = unit.members.length;
                            // this.$set('max_member_atempt',max_member_atempt+1);

                        },
                        removeMemberFormInstance:function(index){
                            // var unit = this.$get('unit');
                            // var deleted_queue_ids = this.$get('deleted_queue_ids');
                            // var member = unit.members[index];
                            // var max_member_atempt = this.$get('max_member_atempt');
                            
                            // if(member.id != ''){
                            //     console.log('This were existent record in dbs');
                            //     if(confirm('This were existent record in dbs are you sure want to delete this member ?')){
                            //         console.log('Add id deleted_queue_ids');
                            //         deleted_queue_ids.push(member.id);
                            //         unit.members.splice(index, 1);
                            //         unit.member_count = unit.members.length;
                            //         this.$set('max_member_atempt',max_member_atempt-1);

                            //         console.log('Sent ajax request by with deleted_queue_ids as params after user click submit');
                            //     }
                            // }else{
                            //     console.log('This were unexistent record in dbs');

                            //     unit.members.splice(index, 1);
                            //     unit.member_count = unit.members.length;

                            //     this.$set('max_member_atempt',max_member_atempt-1);
                            // }
                        },
                        saveEditing:function(id){
                            // var data = {
                            //     deleted_queue_ids : this.$get('deleted_queue_ids'),
                            //     unit: this.$get('unit')
                            // };
                            // var url_proxy = site_url()+'transaksi/details-card-numbers-save/'+id+'?uuid='+uuidv4()
                            // this.$http.post(url_proxy, data).then(function(response) {
                            //     var unit = response.data;
                            //     this.$set('enable_editing',false);

                            //     this.setUnit(unit);
                            //     console.log(response);
                            // });

                        }
                    }        
                });
            });
        </script>

        <style type="text/css">
            #formentry .text-left{text-align: left;}
            .fr{float: right;}
            .margin-left-1em{margin-left: 1em;}
            #member_list{
                /*border: solid 1px red;*/
            }
            .padding-left-0{padding-left: 0}
            .f-bg{
                    background-size: cover !important;
    background-position: center center !important;
    height: 200px !important;
            }
            .sp-text{

    font-weight: bold;
    text-shadow: rgb(43, 54, 67) 1px 1px 1px;
 
            }
        </style>
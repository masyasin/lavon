<div style="padding: 1em"></div>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa"></i>LOYALTY &amp; REWARDS MANAGEMENT SYSTEM </div>
<!-- <div class="tools">
<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
<a href="javascript:;" class="reload" data-original-title="" title=""> </a>
<a href="javascript:;" class="remove" data-original-title="" title=""> </a>
</div> -->
</div>
<template id="member-template">

    <form v-bind:name="'member_'+$index" v-for="member in unit.members" class="prevent-submit">
        <div v-if="$index>0" style="padding-top: 2em"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label col-md-2 text-muted text-left"><span v-if="$index==0">Member Details</span></label>
                    <input type="hidden" name="id" v-model="member.id" :disabled="!enable_editing" >
                    <input type="hidden" name="id_unit" v-model="member.id_unit" :disabled="!enable_editing" >


                    <div class="col-md-3">
                        <select class="form-control" name="status" v-model="member.status" :disabled="!enable_editing" > 
                            <option value="">PILIH STATUS</option>
                            <option v-for="(k,v) in status_member" value="{{k}}">{{v}}</option>
                        </select> 
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nama" v-model="member.nama" :disabled="!enable_editing" >
                    </div>
                    <div class="col-md-1">
                        <!-- <button v-if="$index == (max_member_atempt-1)&&(max_member_atempt!=unit.max_member)" :disabled="!enable_editing"  class="button add-button btn btn-primary" @click.prevent="parent.addMemberFormInstance()"><i class="fa fa-plus bold"></i></button>

                        <button v-if="($index != (max_member_atempt-1)||(max_member_atempt==unit.max_member)) " :disabled="!enable_editing"  class="button add-button btn btn-danger" @click.prevent="parent.removeMemberFormInstance($index)"><i class="fa fa-minus bold"></i></button> -->
                        <button v-if="$index == 0" :disabled="!enable_editing || (max_member_atempt == unit.max_member)"  class="button add-button btn btn-primary" @click.prevent="parent.addMemberFormInstance()"><i class="fa fa-plus bold"></i></button>

                        <button v-if="$index != 0 " :disabled="!enable_editing"  class="button add-button btn btn-danger" @click.prevent="parent.removeMemberFormInstance($index)"><i class="fa fa-minus bold"></i></button>
                    </div>
                </div>

            </div>
        </div>

        <!--  -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <label class="control-label col-md-3 bold text-left">ID Number</label>
                    <div class="col-md-2">
                        <select class="form-control" name="jenis_identitas" v-model="member.jenis_identitas" :disabled="!enable_editing" > 
                            <option value="">PILIH JENIS</option>
                            <option v-for="(k,v) in jenis_identitas" value="{{k}}">{{v}}</option>
                        </select> 
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="nomor_identitas" v-model="member.nomor_identitas" :disabled="!enable_editing" >
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">Birth Date</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="tgl_lahir" v-model="member.tgl_lahir" :disabled="!enable_editing"  data-provide="datepicker">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">Phone Number</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="kontak" v-model="member.kontak" :disabled="!enable_editing" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">Email</label>

                    <div class="col-md-7">
                        <input type="email" class="form-control" name="email" v-model="member.email" :disabled="!enable_editing" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">Address</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="alamat" v-model="member.alamat" :disabled="!enable_editing" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2 m-grid-responsive-sm"></div>
                    <label class="control-label col-md-3 bold text-left">District</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="distrik" v-model="member.distrik" :disabled="!enable_editing" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <label class="control-label col-md-3 bold text-left">City</label>
                    <div class="col-md-7">
                        <select class="form-control" name="id_kota" v-model="member.id_kota" :disabled="!enable_editing" > 
                            <option value="">PILIH KOTA</option>
                            <option v-for="c in daftar_kota" value="{{c.id}}">{{c.nama}}</option>
                        </select> 
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
                            <input type="text" class="form-control" placeholder="Type name or unit no. to search" name="ac_unit_number" id="ac_unit_number" v-model="ac_unit_number"></div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2 bold text-left">Card Number</label>
                            <div class="col-md-10">
                                <input :disabled="!enable_editing" type="text" class="form-control" name="card_number" v-model="unit.card_number"> </div>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 bold text-left">Member Since</label>
                                    <div class="col-md-10">
                                        <input :disabled="!enable_editing" type="text" class="form-control" name="tgl_berlaku" v-model="unit.tgl_berlaku" data-provide="datepicker"> 
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 bold text-left">Member Expired</label>
                                    <div class="col-md-10">
                                        <input :disabled="!enable_editing" type="text" class="form-control" name="tgl_berakhir" v-model="unit.tgl_berakhir" data-provide="datepicker"> 
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="col-md-12">

                            <button :disabled="!enable_editing" type="button" class="btn btn-warning bold" @click="cancelEditing()">Cancel</button>


                            <button :disabled="!enable_editing" type="button" class="btn btn-success fr margin-left-1em bold" @click="saveEditing(unit.id)">Submit</button>
                            
                            <button  :disabled="enable_editing || !has_valid_unit" type="button" class="btn btn-info fr bold" @click="toggleEnableEditing()">Edit</button>

                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

        <script type="text/javascript">
            $=jQuery;
            $vm={};
            
            $(document).ready(function(){
               $.fn.datepicker.defaults.format = "yyyy-mm-dd"; 
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
                        enable_editing:false,
                        daftar_kota : <?=json_encode($daftar_kota)?>,
                        jenis_identitas : <?=json_encode($jenis_identitas)?>,
                        status_member : <?=json_encode($status_member)?>,
                        daftar_unit : <?=json_encode($daftar_unit)?>,
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
                            this.$http({url: site_url()+'unit/fetchRowJson/'+unit.id+'?uuid='+uuidv4(), method: 'GET'}).then(function (response) {
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
                            this.$set('enable_editing',!this.$get('enable_editing'));
                            var textbox = $('input[name=card_number]');

                            textbox.show("fast", function () {
                                textbox[0].focus();
                            });
                        },
                        cancelEditing:function(){
                            this.$set('enable_editing',false);
                        },
                        setEmptyMemberForm:function(unit){
                            this.$set('max_member_atempt',1);
                            var member = $.extend(true, {},this.$get('member_data_template'));
                            member.id_unit = unit.id;
                            
                            member.tgl_berlaku  = unit.tgl_berlaku;
                            member.tgl_berakhir = unit.tgl_berakhir;

                            unit.members = [member];
                            unit.member_count = unit.members.length;
                            this.$set('unit', unit);
                        },
                        addMemberFormInstance :function() {
                            // body...
                            
                            var unit = this.$get('unit');
                            var max_member_atempt = this.$get('max_member_atempt');

                            if(max_member_atempt >= unit.max_member ){
                                console.log('can\'t addMemberFormInstance exceed max_member unit is ' + unit.max_member);
                                return;
                            }
                            console.log('addMemberFormInstance');
                            var member =  $.extend(true, {},this.$get('member_data_template'));
                            member.id_unit = unit.id;
                     
                            
                            member.tgl_berlaku  = unit.tgl_berlaku;
                            member.tgl_berakhir = unit.tgl_berakhir;

                            unit.members.push(member);
                            this.$set('unit', unit);
                            unit.member_count = unit.members.length;
                            this.$set('max_member_atempt',max_member_atempt+1);

                        },
                        removeMemberFormInstance:function(index){
                            var unit = this.$get('unit');
                            var deleted_queue_ids = this.$get('deleted_queue_ids');
                            var member = unit.members[index];
                            var max_member_atempt = this.$get('max_member_atempt');
                            
                            if(member.id != ''){
                                console.log('This were existent record in dbs');
                                if(confirm('This were existent record in dbs are you sure want to delete this member ?')){
                                    console.log('Add id deleted_queue_ids');
                                    deleted_queue_ids.push(member.id);
                                    unit.members.splice(index, 1);
                                    unit.member_count = unit.members.length;
                                    this.$set('max_member_atempt',max_member_atempt-1);

                                    console.log('Sent ajax request by with deleted_queue_ids as params after user click submit');
                                }
                            }else{
                                console.log('This were unexistent record in dbs');

                                unit.members.splice(index, 1);
                                unit.member_count = unit.members.length;

                                this.$set('max_member_atempt',max_member_atempt-1);
                            }
                        },
                        saveEditing:function(id){
                            var data = {
                                deleted_queue_ids : this.$get('deleted_queue_ids'),
                                unit: this.$get('unit')
                            };

                            this.$http.post(site_url()+'member/save/'+id+'?uuid='+uuidv4(), data).then(function(response) {
                                var unit = response.data;
                                this.$set('enable_editing',false);

                                this.setUnit(unit);
                                console.log(response);
                            });

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
        </style>
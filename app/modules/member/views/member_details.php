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

<form v-bind:name="'member'+$index" v-for="member in unit.members">
<div v-if="$index>0" style="padding-top: 2em"></div>
<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 text-muted text-left"><span v-if="$index==0">Member Details</span></label>



                                    <div class="col-md-3">
                                        <select class="form-control" name="status" v-model="member.status"> 
                                            <option></option>
                                            <option v-for="(k,v) in status_member" value="{{k}}">{{v}}</option>
                                        </select> 
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nama" v-model="member.nama">
                                    </div>
                                    <div class="col-md-1">
                                        <button class="button add-button btn btn-primary" @click="CreateMember()"><i class="fa fa-plus bold"></i></button>
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
                                        <select class="form-control" name="jenis_identitas" v-model="member.jenis_identitas"> 
                                            <option value=""></option>
                                            <option v-for="(k,v) in jenis_identitas" value="{{k}}">{{v}}</option>
                                        </select> 
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="nomor_identitas" v-model="member.nomor_identitas">
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
                                        <input type="text" class="form-control" name="tgl_lahir" v-model="member.tgl_lahir">
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
                                        <input type="text" class="form-control" name="kontak" v-model="member.kontak">
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
                                        <input type="email" class="form-control" name="email" v-model="member.email">
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
                                        <input type="text" class="form-control" name="alamat" v-model="member.alamat">
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
                                        <input type="text" class="form-control" name="distrik" v-model="member.distrik">
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
                                        <select class="form-control" name="id_kota" v-model="member.id_kota"> 
                                            <option value=""></option>
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
    <form id="formentry" action="#" class="form-horizontal">
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
                                <input type="text" class="form-control" name="card_number" v-model="unit.card_number"> </div>
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
                        <div class="alert alert-warning" v-if="!unit.has_member">No Members To Display, please specify unit number to display.</div>    
                        <members :unit="unit" 
                                 :daftar_kota="daftar_kota"
                                 :status_member="status_member"
                                 :jenis_identitas="jenis_identitas"></members>
                        </div> 
                    </div>
                    <div class="form-actions">
                        <div class="col-md-12">

                            <button type="button" class="btn btn-warning bold" @click="cancelEditing()">Cancel</button>


                            <button type="button" class="btn btn-success fr margin-left-1em bold" @click="saveEditing()">Submit</button>
                            
                            <button type="button" class="btn btn-info fr bold" @click="toggleEditing()">Edit</button>

                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

        <script type="text/javascript">
            $=jQuery;
            $(document).ready(function(){
                
                $('#formentry').submit(function(){return false;});
                Vue.component('members', {
                    props: ['unit','daftar_kota','jenis_identitas','status_member'],
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
                var app = new Vue({
                    el:'#app',
                    data:{
                        enable_editing:false,
                        daftar_kota : <?=json_encode($daftar_kota)?>,
                        jenis_identitas : <?=json_encode($jenis_identitas)?>,
                        status_member : <?=json_encode($status_member)?>,
                        daftar_unit : <?=json_encode($daftar_unit)?>,
                        unit:{
                            members:[],
                            has_member:false,
                            unit_number:'',
                            card_number:'',
                            max_member:''
                        },
                        is_dirty:true,
                        ac_unit_number:''

                    },
                    ready: function(){
                        // INIT AUTOCOMPLETE
                        ac_unit.init(this);
                    },
                    methods: {
                        setUnit:function(unit){
                            console.log(unit);
                            this.$http({url: site_url()+'unit/fetchRowJson/'+unit.id+'?uuid='+uuidv4(), method: 'GET'}).then(function (response) {
                                this.$set('unit', response.data)
                                //Or we as we did before
                                //vm.stories = response.data
                            })

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
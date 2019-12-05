<?php
class Print_pdf_model extends CI_Model{

     
     function print_property($where)
     { 
          $this->db->select('property_transfer_record.*,DATE_FORMAT(date, "%d/%m/%Y") as n_date');    
           $this->db->from('property_transfer_record');
           $this->db->where('id',$where);
           $query = $this->db->get();
           return $query->result();
        
       }
       function print_inherit($where)
     { 
          $this->db->select('inheritance_certificate.*,DATE_FORMAT(date, "%d/%m/%Y") as n_date');    
           $this->db->from('inheritance_certificate');
           $this->db->where('id',$where);
           $query = $this->db->get();
           return $query->result();
        
       }
       function print_fire($where)
     { 
          $this->db->select('fire_fighting_noc.*, DATE_FORMAT(ref_date, "%d/%m/%Y") as nref_date, DATE_FORMAT(bill_date, "%d/%m/%Y") as nbill_date, DATE_FORMAT(certificate_date, "%d/%m/%Y") as ncertificate_date');    
           $this->db->from('fire_fighting_noc');
           $this->db->where('id',$where);
           $query = $this->db->get();
           return $query->result();
        
       }
       function print_occuption($where)
       { 
            $this->db->select('occuption_certificate.*, DATE_FORMAT(date, "%d/%m/%Y") as ndate');    
             $this->db->from('occuption_certificate');
             $this->db->where('id',$where);
             $query = $this->db->get();
             return $query->result();
          
         }
         function print_part($where)
       { 
            $this->db->select('part_certificate.*, DATE_FORMAT(date, "%d/%m/%Y") as ndate');    
             $this->db->from('part_certificate');
             $this->db->where('id',$where);
             $query = $this->db->get();
             return $query->result();
          
         }
         function print_zone($where)
         { 
              $this->db->select('zone_certificate.*, DATE_FORMAT(date, "%d/%m/%Y") as ndate');    
               $this->db->from('zone_certificate');
               $this->db->where('id',$where);
               $query = $this->db->get();
               return $query->result();
            
           }
           function print_construction($where)
           { 
                $this->db->select('construction_certificate.*, DATE_FORMAT(date, "%d/%m/%Y") as ndate');    
                 $this->db->from('construction_certificate');
                 $this->db->where('id',$where);
                 $query = $this->db->get();
                 return $query->result();
              
             }
             function print_plant($where)
             { 
                  $this->db->select('plant_certificate.*, DATE_FORMAT(date, "%d/%m/%Y") as ndate');    
                   $this->db->from('plant_certificate');
                   $this->db->where('id',$where);
                   $query = $this->db->get();
                   return $query->result();
                
               }
               function print_firefight($where)
               { 
                    $this->db->select('fire_fighting.*, DATE_FORMAT(ref_date, "%d/%m/%Y") as nref_date, DATE_FORMAT(bill_date, "%d/%m/%Y") as nbill_date, DATE_FORMAT(certificate_date, "%d/%m/%Y") as ncertificate_date');    
                     $this->db->from('fire_fighting');
                     $this->db->where('id',$where);
                     $query = $this->db->get();
                     return $query->result();
                  
                 }
                 function print_outstanding($where)
                 { 
                      $this->db->select('outstanding_certificate.*, DATE_FORMAT(app_date, "%d/%m/%Y") as napp_date, DATE_FORMAT(res_date, "%d/%m/%Y") as nres_date');    
                       $this->db->from('outstanding_certificate');
                       $this->db->where('id',$where);
                       $query = $this->db->get();
                       return $query->result();
                    
                   }
                   function print_no_obj($where)
                   { 
                        $this->db->select('noc_certificate.*');    
                         $this->db->from('noc_certificate');
                         $this->db->where('id',$where);
                         $query = $this->db->get();
                         return $query->result();
                      
                     }
                     function print_resident($where)
                     { 
                          $this->db->select('resident_certificate.*, DATE_FORMAT(date, "%d/%m/%Y") as ndate');    
                           $this->db->from('resident_certificate');
                           $this->db->where('id',$where);
                           $query = $this->db->get();
                           return $query->result();
                        
                       }
                       function print_receipt($where)
                     { 
                          $this->db->select('marrige_receipt.*');    
                           $this->db->from('marrige_receipt');
                           $this->db->where('id',$where);
                           $query = $this->db->get();
                           return $query->result();
                        
                       }
                       
     
}
?>
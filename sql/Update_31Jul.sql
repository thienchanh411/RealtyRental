use FinalProject;

alter table transaction
modify requestedDate datetime;  
alter table transaction
modify approvedDate datetime;  
alter table transaction
add rejectedDate datetime;  
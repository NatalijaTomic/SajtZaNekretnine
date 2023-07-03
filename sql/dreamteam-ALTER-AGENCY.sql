USE dreamteam;

ALTER TABLE `tbl_property` MODIFY `agency_id` int(11) DEFAULT NULL;
--
-- Constraints for table `tbl_property`
--
ALTER TABLE `tbl_property`
DROP CONSTRAINT `agency` ;
ALTER TABLE `tbl_property`
  ADD CONSTRAINT `agency` FOREIGN KEY (`agency_id`) REFERENCES `tbl_agency` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


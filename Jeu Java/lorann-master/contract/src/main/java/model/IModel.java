package model;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import controller.Order;
import showboard.IPawn;
import view.IView;


public interface IModel {

	List<Level> getTraining() throws SQLException;
	
    List<Level> getLevel1() throws SQLException;

    List<Level> getLevel2() throws SQLException;
    
    List<Level> getLevel3() throws SQLException;
    
    List<Level> getLevel4() throws SQLException;
    
    List<Level> getLevel5() throws SQLException;
    
    List<Level> getFinalLevel() throws SQLException;

	ArrayList<IPawn> setPawns(List<Level> level);
	
	void move(Order order, IView view);
	
	boolean isSpellPass(IView view);
}

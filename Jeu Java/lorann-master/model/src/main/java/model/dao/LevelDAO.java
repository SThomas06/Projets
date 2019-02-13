package model.dao;

import java.sql.CallableStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import model.Level;


public abstract class LevelDAO extends AbstractDAO {

    /** The sql loads */
	private static String sqlLoad0   = "{call load0()}";
	
    private static String sqlLoad1   = "{call load1()}";
    
    private static String sqlLoad2   = "{call load2()}";
    
    private static String sqlLoad3   = "{call load3()}";
    
    private static String sqlLoad4   = "{call load4()}";
    
    private static String sqlLoad5   = "{call load5()}";
    
    private static String sqlLoadF   = "{call loadf()}";

    
    /**
     * Gets the levels in the database.
     *
     * @return the all examples
     * @throws SQLException
     *             the SQL exception
     */
    
    public static List<Level> getTraining() throws SQLException {
		final ArrayList<Level> level0 = new ArrayList<Level>();
        final CallableStatement callStatement = prepareCall(sqlLoad0);
        if (callStatement.execute()) {
            final ResultSet result = callStatement.getResultSet();
            while(result.next()) {
            	Level level = new Level();
            	level0.add(level);
            	for (int i=1; i<=21;i++) {
            		if (result.getObject(i) != null)
            			level.add((int) result.getObject(i));
            	}
            }
                result.close();
        }
        return level0;
	}
    
    public static List<Level> getLevel1() throws SQLException {
        final ArrayList<Level> level1 = new ArrayList<Level>();
        final CallableStatement callStatement = prepareCall(sqlLoad1);
        if (callStatement.execute()) {
            final ResultSet result = callStatement.getResultSet();
            while(result.next()) {
            	Level level = new Level();
            	level1.add(level);
            	for (int i=1; i<=26;i++) {
            		level.add((int) result.getObject(i));
            	}
            }
            result.close();
        }
        return level1;
    }
    
    public static List<Level> getLevel2() throws SQLException {
    	final ArrayList<Level> level2 = new ArrayList<Level>();
        final CallableStatement callStatement = prepareCall(sqlLoad2);
        if (callStatement.execute()) {
            final ResultSet result = callStatement.getResultSet();
            while(result.next()) {
            	Level level = new Level();
            	level2.add(level);
            	for (int i=1; i<=35;i++) {
            		level.add((int) result.getObject(i));
            	}
            }
                result.close();
        }
        return level2;
    }
    
    public static List<Level> getLevel3() throws SQLException {
    	final ArrayList<Level> level3 = new ArrayList<Level>();
        final CallableStatement callStatement = prepareCall(sqlLoad3);
        if (callStatement.execute()) {
            final ResultSet result = callStatement.getResultSet();
            while(result.next()) {
            	Level level = new Level();
            	level3.add(level);
            	for (int i=1; i<=26;i++) {
            		level.add((int) result.getObject(i));
            	}
            }
                result.close();
        }
        return level3;
    }
    
    public static List<Level> getLevel4() throws SQLException {
    	final ArrayList<Level> level4 = new ArrayList<Level>();
        final CallableStatement callStatement = prepareCall(sqlLoad4);
        if (callStatement.execute()) {
            final ResultSet result = callStatement.getResultSet();
            while(result.next()) {
            	Level level = new Level();
            	level4.add(level);
            	for (int i=1; i<=26;i++) {
            		level.add((int) result.getObject(i));
            	}
            }
                result.close();
        }
        return level4;
    }
    
    public static List<Level> getLevel5() throws SQLException {
    	final ArrayList<Level> level5 = new ArrayList<Level>();
        final CallableStatement callStatement = prepareCall(sqlLoad5);
        if (callStatement.execute()) {
            final ResultSet result = callStatement.getResultSet();
            while(result.next()) {
            	Level level = new Level();
            	level5.add(level);
            	for (int i=1; i<=26;i++) {
            		level.add((int) result.getObject(i));
            	}
            }
                result.close();
        }
        return level5;
    }

	public static List<Level> getFinalLevel() throws SQLException {
		final ArrayList<Level> levelF = new ArrayList<Level>();
        final CallableStatement callStatement = prepareCall(sqlLoadF);
        if (callStatement.execute()) {
            final ResultSet result = callStatement.getResultSet();
            while(result.next()) {
            	Level level = new Level();
            	levelF.add(level);
            	for (int i=1; i<=26;i++) {
            		level.add((int) result.getObject(i));
            	}
            }
                result.close();
        }
        return levelF;
	}
    
    
}
package view;

import java.awt.event.KeyListener;
import java.util.List;

import model.Level;
import showboard.BoardFrame;

/**
 * <h1>The Interface IView.</h1>
 *
 * @author Jean-Aymeric DIET jadiet@cesi.fr
 * @version 1.0
 */
public interface IView {

    /**
     * Display message.
     *
     * @param message
     *            the message
     */
    void displayMessage(String message, String title, int type);

    int choseLevel(String msg, String title, String[] buttons, int index);
    
	BoardFrame getGameFrame();
	
	void setLevel(KeyListener controller, List<Level> level);
}

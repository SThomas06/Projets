package view;

import java.awt.Color;
import java.awt.HeadlessException;
import java.awt.event.KeyListener;
import java.io.File;
import java.io.IOException;
import java.util.List;

import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JOptionPane;
import javax.swing.JPanel;

import model.Level;
import showboard.*;

public class ViewFacade implements IView {
	private BoardFrame gameFrame;
	
    public BoardFrame getGameFrame() {
		return gameFrame;
	}

	public ViewFacade() {
        super();
    }
    
	@Override
	public void setLevel(KeyListener controller, List<Level> level) {
		int[][] tab;
		tab = new int[level.size()][level.get(0).getLine().size()];
		for (int i=0; i<level.size(); i++) {
			for (int j=0; j<level.get(i).getLine().size(); j++) {
				tab[i][j] = level.get(i).getLine().get(j);
			}
		}
		gameFrame = new BoardFrame("Lorann VS Thibault ULTIMATE BATTLE", false, controller, tab);
        ((JPanel) gameFrame.getObserver()).setBackground(Color.BLACK);
	}
	
    @Override
    public final void displayMessage(final String message, final String title, final int type) {
        JOptionPane.showMessageDialog(null, message, title, type);
    }

	@SuppressWarnings("static-access")
	@Override
	public int choseLevel(String msg, String title, String[] buttons, int index) {
		JOptionPane choice = new JOptionPane();
		try {
			return choice.showOptionDialog(null, msg, title, JOptionPane.DEFAULT_OPTION, JOptionPane.PLAIN_MESSAGE, new ImageIcon(ImageIO.read(new File("../sprites/gate_open.png"))), buttons, buttons[index]);
		} catch (HeadlessException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return 0;
	}
}

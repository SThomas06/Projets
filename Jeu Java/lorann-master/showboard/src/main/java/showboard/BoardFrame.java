package showboard;

import java.awt.Dimension;
import java.awt.Rectangle;
import java.awt.event.KeyListener;
import java.io.IOException;
import java.util.List;
import java.util.Observer;

import javax.swing.JFrame;

import showboard.squares.*;
import showboard.squares.Void;


/**
 * <h1>The Class BoardFrame.</h1>
 * <p>
 * This class is just used to load the BoardPanel. It extends JPanel and implements IBoard.
 * </p>
 * <p>
 * As the BoardPanel is a private class, BoardPanel is a Facade.
 * </p>
 *
 * @author Anne-Emilie DIET
 * @version 3.0
 * @see JFrame
 * @see BoardPanel
 * @see Dimension
 * @see Rectangle
 * @see IBoard
 * @see ISquare
 * @see IPawn
 */

public class BoardFrame extends JFrame implements IBoard {

    /** The Constant serialVersionUID. */
    private static final long serialVersionUID = -6563585351564617603L;

    /** The board panel. */
    private final BoardPanel  boardPanel;

    /**
     * Instantiates a new board frame.
     *
     * @param title
     *            the title of the frame
     * @param decorated
     *            the decorated
     */
    public BoardFrame(final String title, final Boolean decorated, final KeyListener controller, int[][] tab) {
        super();
        this.setTitle(title);
        this.setSize(1600, 808);
        this.setLocationRelativeTo(null);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setUndecorated(decorated);
        this.boardPanel = new BoardPanel();
        
        this.setContentPane(this.boardPanel);
        this.setDimension(new Dimension(tab[0].length, tab.length));
        this.setSquares(tab);
        
        this.setResizable(false);
        this.setVisible(true);
        this.addKeyListener(controller);
    }

    /**
     * Instantiates a new board frame.
     *
     * @param title
     *            the title
     */
    public BoardFrame(final String title, final KeyListener controller, int[][] tab) {
        this(title, false, controller, tab);
    }

    /**
     * Instantiates a new board frame.
     */
    public BoardFrame(final KeyListener controller, int[][] tab) {
        this("", false, controller, tab);
    }

    /**
     * Instantiates a new board frame.
     *
     * @param decorated
     *            the decorated
     */
    public BoardFrame(final Boolean decorated, final KeyListener controller, int[][] tab) {
        this("", decorated, controller, tab);
    }
    
    public void setSquares(int[][] tab) {
    	try {
			for (int i = 0; i < tab.length; i++) {
	        	for (int j = 0; j < tab[i].length; j++) {
	        		switch(tab[i][j]) {
	        		case 0:
	        			this.addSquare(new Bone(), j, i);
	        			break;
	        		case 1:
	        			this.addSquare(new BoneH(), j, i);
	        			break;
	        		case 2:
	        			this.addSquare(new BoneV(), j, i);
	        			break;
	        		case 4:
	        			this.addSquare(new GateO(), j, i);
	        			break;
	        		case 6:
	        			this.addSquare(new GateC(), j, i);
	        			break;
	        		case 7:
	        			this.addSquare(new Purse(), j, i);
	        			break;
	        		case 8:
	        			this.addSquare(new CrystalBall(), j, i);
	        			break;
	        		default:
	        			this.addSquare(new Void(), j, i);
	        			break;
	        		}
	        	}
			}
		} catch (IOException e) {
			e.printStackTrace();
		}
    }
    
    /*
     * (non-Javadoc)
     * @see fr.exia.showboard.IBoard#addSquare(fr.exia.showboard.ISquare, int, int)
     */
    @Override
    public final void addSquare(final ISquare square, final int x, final int y) {
        this.getBoardPanel().addSquare(square, x, y);
    }

    /*
     * (non-Javadoc)
     * @see fr.exia.showboard.IBoard#addPawn(fr.exia.showboard.IPawn)
     */
    @Override
    public final void addPawn(final IPawn pawn) {
        this.getBoardPanel().addPawn(pawn);
    }
    @Override
    public final void addPawns(final List<IPawn> pawns) {
        this.getBoardPanel().addPawns(pawns);
    }

    /*
     * (non-Javadoc)
     * @see fr.exia.showboard.IBoard#getObserver()
     */
    @Override
    public final Observer getObserver() {
        return this.getBoardPanel();
    }

    /*
     * (non-Javadoc)
     * @see fr.exia.showboard.IBoard#setDimension(java.awt.Dimension)
     */
    @Override
    public final void setDimension(final Dimension dimension) {
        this.getBoardPanel().setDimension(dimension);
    }

    /*
     * (non-Javadoc)
     * @see fr.exia.showboard.IBoard#getDimension()
     */
    @Override
    public final Dimension getDimension() {
        return this.getBoardPanel().getDimension();
    }
    
    /**
     * Gets the squares.
     */
    public ISquare[][] getSquares() {
    	return this.getBoardPanel().getSquares();
    }

    /**
     * Gets the board panel.
     *
     * @return the board panel
     */
    private BoardPanel getBoardPanel() {
        return this.boardPanel;
    }
}
